<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use Illuminate\Support\Facades\DB;
use App\Models\Especialidad;
use App\Models\Objetivo;
use App\Models\Atributo;
use App\Models\Criterio;
use App\Models\Personal;
use App\Models\Formacion;
use App\Models\Producto;
use App\Models\Contactos;
use App\Models\Archivo;
use App\Models\Reticula;
use App\Models\Asignatura_programa;
use App\Models\Materia_especialidad;
use Illuminate\Support\Facades\Auth;


class ProgramasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carreras=Programa::select('programas.id as id_pro','programas.nombre','programas.plan_estudios','archivos.nom_img_carr')
        ->join('archivos','programas.id','archivos.id_programa')->get();


        return view('content.oferta_educativa.index')
        ->with('carreras',$carreras);
    }



    //Mostramos carrera especifica
    public function show($id)
    {
        $programas=DB::table('programas')->select('id','nombre')->get();
        $pro_act=Programa::find($id);
        $especialidades= Especialidad::where('especialidades.id_programa', $id)
        ->join('reticulas', 'especialidades.id', '=', 'reticulas.id_especialidad')
        ->select('especialidades.id','especialidades.nombre','especialidades.clave','especialidades.objetivo', 'reticulas.nom_arch_ret')
        ->get();
        $objetivos=Objetivo::where('id_programa',$id)->get();
        $atributos=Atributo::select('atributos.id as idAtr','atributos.numero as numAtr','atributos.descripcion as desAtr','criterios.id as idCri', 'criterios.numero as numCri','criterios.descripcion as desCri')
        ->leftjoin('criterios', 'atributos.id', '=', 'criterios.id_atributos')
        ->where('atributos.id_programa',$id)
        ->get();
        $personal=Personal::where('id_programa',$id)->get();
        $formacion=Formacion::all();
        $productos=Producto::all();
        //Cuenta los mensajes sin leer del programa
        $n_msg=Contactos::where('id_programa',$id)
        ->where('status',0)
        ->count();
        $archivos=Archivo::where('id_programa',$id)->get();

        //Seleccionamos los datos del programa seleccionado
        $programa=Programa::where('id',$id)->get(); 

        //Materias de tronco comun para el plan de estudios
        $mat_com=Asignatura_programa::where('id_programa',$id)->get(); 

        //Seleccionamos la especialidad que este en la primera posicion
        $idEsp=Especialidad::select('id')->where('id_programa',$id)->get();

        if(!$idEsp->isEmpty())
        {
            //Materias de especialidad del programa seleccionado
            $materias_esp=Programa::join('especialidades','especialidades.id_programa', 'programas.id')
            ->join('materias_especialidad','materias_especialidad.id_especialidad','especialidades.id')
            ->select('programas.id','especialidades.id as id_especialidad','especialidades.nombre as esp_nombre','materias_especialidad.*')
            ->where('especialidades.id',$idEsp[0]->id)
            ->get();
        }
        else
        {
            $materias_esp=Programa::leftjoin('especialidades','especialidades.id_programa', 'programas.id')
            ->leftjoin('materias_especialidad','materias_especialidad.id_especialidad','especialidades.id')
            ->select('programas.id','especialidades.id as id_especialidad','especialidades.nombre as esp_nombre','materias_especialidad.*')
            ->where('programas.id',$id)
            ->get();
        }


        //Fin de datos para el plan de estudios
        return view('content.oferta_educativa.info')
        ->with('programas',$programas)
        ->with('pro_act',$pro_act)
        ->with('especialidades',$especialidades)
        ->with('objetivos',$objetivos)
        ->with('atributos',$atributos)
        ->with('personal',$personal)
        ->with('formacion',$formacion)
        ->with('productos',$productos)
        ->with('n_msg',$n_msg)
        ->with('archivos',$archivos)
        ->with('programa',$programa)
        ->with('materias_esp',$materias_esp)
        ->with('mat_com',$mat_com);
    }

}
