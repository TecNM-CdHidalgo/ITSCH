<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Utilities\DataTableAttr;
use App\Http\Controllers\Utilities\DataTableHelper;
use App\Http\Controllers\Utilities\HttpCode;
use Carbon\Carbon;
use PhpParser\Node\Stmt\Return_;

class BibliotecaController extends Controller
{
    //Función para cargar los registros por medio de un ajax al dataTable
    public function cargarServiciosAjax(Request $request) {
        try {
            $selectColumns = ['servicio', 'car_Clave', 'control', 'sexo'];
            $dtAttr = new DataTableAttr($request, $selectColumns);

            // Creamos una instruccion sql normal para pasarla al paginador
            $query = DB::table('registro_biblio')->select($selectColumns)->where('control','!=','');

            // Aplicamos los filtros usando DataTableHelper antes de ejecutar la consulta
            DataTableHelper::applyAllExcept($query, $dtAttr, []);

            // Llamamos a la función completar para agregar datos adicionales
           $obj= $this->completar($query);

            // Obtenemos la respuesta paginada
            $paginatorResponse = DataTableHelper::paginatorResponse($query, $dtAttr);

            return response()->json($paginatorResponse, HttpCode::SUCCESS);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), HttpCode::NOT_ACCEPTABLE);
        }

    }

    //Funcion para completar los datos de los alumnos
    public function completar($servicios)
    {
        // Obtener números de control y hacer un trim para quitar espacios en blanco
        $controles = $servicios->pluck('control')->map(function ($control) {
            return trim($control);
        })->unique()->values(); // Asegúrate de eliminar duplicados y resetear los índices

        $alumnosMap = collect();

        // Dividir los controles en lotes de 2000 para evitar el límite de parámetros
        $chunks = $controles->chunk(2000);

        foreach ($chunks as $chunk) {
            $resultado = DB::connection('contEscSQL')
                ->table('Alumnos')
                ->leftJoin('carreras', 'alumnos.car_Clave', '=', 'carreras.car_Clave')
                ->select(
                    'alumnos.alu_NumControl',
                    DB::raw("CONCAT(alumnos.alu_Nombre, ' ', alumnos.alu_ApePaterno, ' ', alumnos.alu_ApeMaterno) as nombre"),
                    'carreras.car_Nombre as carrera'
                )
                ->whereIn('alumnos.alu_NumControl', $chunk)
                ->get();

            $alumnosMap = $alumnosMap->merge($resultado->keyBy('alu_NumControl'));
        }

        // Mapeo de los códigos de servicio a sus nombres correspondientes
        $serviciosNombres = [
            1 => 'Consulta en sala',
            2 => 'Préstamo de cúbiculo',
            3 => 'Hemeroteca',
            4 => 'Sala de computo'
        ];

        foreach ($servicios as $servicio) {
            $alumno = $alumnosMap->get($servicio->control);
            if ($alumno) {
                $servicio->nombre = $alumno->nombre;
                $servicio->carrera = $alumno->carrera;
            }

            // Asignar nombre del servicio
            $servicio->servicio = $serviciosNombres[$servicio->servicio] ?? 'Servicio desconocido';

            // Cambiar la letra del sexo por su significado
            $servicio->sexo = ($servicio->sexo == 'F') ? 'Femenino' : 'Masculino';
        }

        return $servicios; // Devuelve los servicios completados
    }



    //Funcion para buscar un alumno en la base de datos de control escolar
    public function findAlumno(Request $request)
    {
        $alumno = DB::connection('contEscSQL')->table('Alumnos')
        ->select('alu_NumControl','alu_Nombre','alu_ApePaterno','alu_ApeMaterno','car_Clave','alu_Sexo')
        ->where('alu_NumControl',$request->control)
        ->first();

       //Agregamos el nombre de la carrera
        $carrera = DB::connection('contEscSQL')->table('Carreras')
        ->where('car_Clave',$alumno->car_Clave)
        ->first();
        $alumno->carrera = $carrera->car_Nombre;

        if($alumno){
            return response()->json($alumno,200);
        }else{
            return response()->json(['error'=>'No se encontro el alumno'],404);
        }
    }

    //Funcion para registrar un alumno en la base de datos de la biblioteca
    public function store(Request $request)
    {
        //Validamos los datos
        $request->validate([
            'control' => 'required',
            'servicio' => 'required',
            'car_Clave' => 'required',
            'sexo' => 'required'
        ]);
        //guardamos el registro
        $registro = new Registro();
        $registro->control = $request->control;
        $registro->car_Clave = $request->car_Clave;
        $registro->servicio = $request->servicio;
        $registro->sexo = $request->sexo;
        $registro->extras= $request->extras;
        $registro->save();
        return response()->json(['success'=>'Se registro el alumno'],200);
    }

    //Función para obtener los servicios de un periodo de tiempo
    public function periodoFind(Request $request)
    {
        //Obtenemos la fecha de inicio y fin
        $inicio = Carbon::parse($request->inicio)->startOfDay();
        $fin = Carbon::parse($request->fin)->endOfDay();

        //Consultamos los registros de la base de datos de la biblioteca
        $servicios = Registro::whereBetween('created_at', [$inicio, $fin])->get();

        //Llamamos a la funcion completar
        $this->completar($servicios);

        //Retornamos los datos en formato json
        return response()->json($servicios, 200);
    }



    //Función para obtener los servicios y la cantidad de veces que se ha solicitado en un periodo de tiempo
    public function serviciosFind(Request $request)
    {
        //Obtenemos la fecha de inicio y fin
        $inicio = Carbon::parse($request->inicio)->startOfDay();
        $fin = Carbon::parse($request->fin)->endOfDay();

        //Consultamos los registros de la base de datos de la biblioteca
        $servicios = Registro::whereBetween('created_at', [$inicio, $fin])->get();

        //Agrupamos los servicios
        $servicios = $servicios->groupBy('servicio');
        //Obtenemos la cantidad de veces que se ha solicitado cada servicio
        $servicios = $servicios->map(function($servicio){
            return $servicio->count();
        });
        //Agregamos el nombre de cada servicio
        $servicios = $servicios->map(function($servicio,$key){
            switch($key){
                case 1:
                    return ['servicio'=>'Consulta en sala','cantidad'=>$servicio];
                    break;
                case 2:
                    return ['servicio'=>'Prestamo de cúbiculo','cantidad'=>$servicio];
                    break;
                case 3:
                    return ['servicio'=>'Hemeroteca','cantidad'=>$servicio];
                    break;
                case 4:
                    return ['servicio'=>'Sala de compúto','cantidad'=>$servicio];
                    break;
            }
        });
        //Retornamos los datos en formato json
        return response()->json($servicios,200);
    }

    //Funcion para registrar la salida de un alumno
    public function bibliotecaSalida(Request $request)
    {
        //Obtenemos el registro del alumno
        $registro = Registro::where('control',$request->no_control)->first();

        //Si el alumno no existe regresamos un error
        if($registro === null){
            return response()->json(['error'=>'El alumno no tiene un ingreso activo en la biblioteca'],404);
        }
        //Si el alumno ya salio
        if($registro->salida){
            return response()->json(['error'=>'El alumno ya salio'],404);
        }
        //Si el alumno no ha salido, registramos la hora y fecha en la que salio
        if ($registro->update(['salida' => now()])) {
            // Actualización exitosa
            return response()->json(['success'=>'Se registro la salida del alumno'],200);
        } else {
            // Falló la actualización
            return response()->json(['error' => 'No se pudo actualizar el registro']);
        }

    }

}
