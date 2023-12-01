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

}
