<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Noticias;
use App\ArchivoNoticia;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fec_act = Carbon::now()->toDateString();
       
        $noticias = Noticias::whereDate('fecha_pub','<=',$fec_act)
        ->whereDate('fecha_fin','>=',$fec_act)
        ->orderBy('id','asc')->get();

       
        $noticias2 = Noticias::whereDate('fecha_pub','<=',$fec_act)
        ->whereDate('fecha_fin','>=',$fec_act)
        ->orderBy('id','desc')->get();

        
        return View('welcome')
        ->with('noticias',$noticias)
        ->with('noticias2',$noticias2);
    }

    public function ver($id)
    {
        $article_exists = Noticias::where('id','=',$id)->get()->count() > 0;
        if(!$article_exists){
            return back()->with('error','La noticia que estas buscando no existe');
        }
        $article = Noticias::find($id);
        $archivos=ArchivoNoticia::where('id_not','=',$id)->get();
       
        return View('notices.vista_notices')
        ->with('articulo',$article)
        ->with('archivos',$archivos);
    }

   
}
