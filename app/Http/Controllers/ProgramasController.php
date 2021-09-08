<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use Illuminate\Http\Request;

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

       $ncarreras=Programa::select('programas.id as id_pro','programas.nombre','programas.plan_estudios','archivos.nom_img_carr')
       ->join('archivos','programas.id','archivos.id_programa')->get()->count();

       $nfilas=($ncarreras+2)/3;
       $nfilas=round($nfilas);

       //dd($nfilas);


       return view('content.oferta_educativa.index')
       ->with('carreras',$carreras);
    }

}
