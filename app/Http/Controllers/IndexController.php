<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Noticias;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticias::orderBy('id','asc')->get();
        $noticias2 = Noticias::orderBy('created_at','desc')->get();        
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
        return View('notices.vista_notices')->with('articulo',$article);
    }

   
}
