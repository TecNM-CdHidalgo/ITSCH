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
        ->select('alu_NumControl','alu_Nombre','alu_ApePaterno','alu_ApeMaterno','car_Clave','alu_Sexo')
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
        //Llamamos a la funcion completar
        $this->completar($servicios);
        //Llamamos la vista de estadisticos
        return view('admin.biblioteca.estadisticos',compact('servicios'));
    }

    //Funcion para mostrar la vista de periodos
    public function periodoShow()
    {
        return view('admin.biblioteca.periodo');
    }


    //Función para obtener los servicios de un periodo de tiempo
    public function periodoFind(Request $request)
    {
        //Obtenemos la fecha de inicio y fin
        $inicio = $request->inicio;
        $fin = $request->fin;
        //Consultamos los registros de la base de datos de la biblioteca
        $servicios = Registro::whereBetween('created_at',[$inicio,$fin])->get();
        //Llamamos a la funcion completar
        $this->completar($servicios);
        //Retornamos los datos en formato json
        return response()->json($servicios,200);
    }

      //Funcion para completar consulta de servicios
      public function completar($servicios)
      {
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
                      $servicio->servicio = 'Sala de compúto';
                      break;
              }
           }
      }

      //Función para obtener los servicios y la cantidad de veces que se ha solicitado en un periodo de tiempo
        public function serviciosFind(Request $request)
        {
            //Obtenemos la fecha de inicio y fin
            $inicio = $request->inicio;
            $fin = $request->fin;
            //Consultamos los registros de la base de datos de la biblioteca
            $servicios = Registro::whereBetween('created_at',[$inicio,$fin])->get();
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
            //Si el alumno no existe
            if(!$registro){
                return response()->json(['error'=>'No se encontro el alumno'],404);
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
