<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BibliotecaController extends Controller
{
    //Funcion para buscar un alumno en la base de datos de control escolar
    public function findAlumno(Request $request)
    {
        $alumno = DB::connection('contEsc')->table('alumnos')
        ->where('alu_NumControl',$request->control)
        ->first();

        //Agregamos el nombre de la carrera
        $carrera = DB::connection('contEsc')->table('carreras')
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
        Registro::create($request->all());
        return response()->json(['success'=>'Se registro el alumno'],200);
    }

    //Funcion para obtener los registros de la base de datos de la biblioteca
    public function estadisticos()
    {
        //Consultamos todos los servicios
        $servicios = Registro::all();
        //Obtenemos el nombre de la carrera de cada alumno
        foreach($servicios as $servicio){
            $carrera = DB::connection('contEsc')->table('carreras')
            ->where('car_Clave',$servicio->car_Clave)
            ->first();
            $servicio->carrera = $carrera->car_Nombre;
        }
        //Obtenemos el nombre de cada alumno
        foreach($servicios as $servicio){
            $alumno = DB::connection('contEsc')->table('alumnos')
            ->where('alu_NumControl',$servicio->control)
            ->first();
            $servicio->nombre = $alumno->alu_Nombre." ".$alumno->alu_ApePaterno." ".$alumno->alu_ApeMaterno;
        }
        //Complementamos el sexo del alumno F= Femenino, M= Masculino
        foreach($servicios as $servicio){
           if($servicio->sexo == 'F'){
               $servicio->sexo = 'Femenino';
              }else{
               $servicio->sexo = 'Masculino';
              }
        }
        //Agregamos el nombre del servicio
        foreach($servicios as $servicio){
            switch($servicio->servicio){
                case 1:
                    $servicio->servicio = 'Consulta en sala';
                    break;
                case 2:
                    $servicio->servicio = 'Prestamo de cúbiculo';
                    break;
                case 3:
                    $servicio->servicio = 'Hemeroteca';
                    break;
                case 4:
                    $servicio->servicio = 'Sala de computo';
                    break;
            }
         }
        //Llamamos la vista de estadisticos
        return view('admin.biblioteca.estadisticos',compact('servicios'));
    }


}
