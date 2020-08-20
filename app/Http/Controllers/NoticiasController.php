<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Noticias;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Noticias::orderBy('created_at','desc')->paginate(5);        
        return View('admin.noticias.inicio')->with('articles',$articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return View('admin.noticias.crear');
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Noticias::find($id);
        if($article == null){
            return back()->with('error','La noticia no existe');
        }
        return View('admin.noticias.editar')->with('article',$article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       if(!Storage::has('public/noticias/imagenes')){
            Storage::makeDirectory('public/noticias/imagenes');
        }
        $article = Noticias::find($id);
        if($article == null){
            return response()->json(array(['type' => 'error', 'message' => 'La noticia no existe']));
        }
        if($request->has('imagen')){
            $file = $request->imagen;
            $imageExtension = $file->getClientOriginalExtension();
            $imageExtension = strtolower($imageExtension);
            if($imageExtension == 'jpg' || $imageExtension == 'png' || $imageExtension == 'jpeg'){
                $path = storage_path().'/app/public/noticias/imagenes/';
                $name = 'noticia_'.time().'.'.strtolower($imageExtension);
                $file->move($path,$name);
                Storage::delete(['public/noticias/imagenes/'.$article->imagen]);
                $article->imagen = $name;
            }else{
                return response()->json(array(['type' => 'error', 'message' => 'La extension '.$imageExtension.' no es valida']));
            }
        }
        $article->titulo = $request->titulo;
        $article->contenido = $request->contenido;
        $article->sintesis = $request->sintesis;        
        $article->fecha_pub = $request->fecha_pub;
        $article->fecha_fin = $request->fecha_fin;
        $article->resaltar = $request->resaltar;
        $article->save();
        return response()->json(array(['type' => 'success', 'message' => 'Articulo modificado correctamente']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(!$request->has('id')){
            return redirect()->route('home');
        }
        $id = $request->id;
        $article = Noticias::find($id);
        if($article == null){
            return back()->with('error','La noticia no existe');
        }
        Storage::delete(['public/noticias/imagenes/'.$article->imagen]);
        Noticias::destroy($id);
        return redirect()->route('admin.noticias.inicio')->with('success'.'Noticia eliminada correctamente');
    }

    /*Funcion para dar de alta las noticias*/
    public function save(Request $request){  
          
        if(!Storage::has('noticias/imagenes')){
            Storage::makeDirectory('noticias/imagenes');
        }
        $article = new Noticias($request->all());
        if($request->has('imagen')){
            $file = $request->imagen;
            $imageExtension = $file->getClientOriginalExtension();
            $imageExtension = strtolower($imageExtension);
            if($imageExtension == 'jpg' || $imageExtension == 'png' || $imageExtension == "jpeg"){
                $path = storage_path().'/app/public/noticias/imagenes/';
                $name = 'noticia_'.time().'.'.strtolower($imageExtension);
                $file->move($path,$name);
                $article->imagen = $name;
            }else{
                return response()->json(array(['type' => 'error', 'message' => 'La extension '.$imageExtension.' no es valida']));
            }
        }
        $article->autor = Auth::User()->name;             
        $article->fecha_pub = $request->fecha_pub;
        $article->fecha_fin = $request->fecha_fin;
        $article->resaltar = $request->resaltar;
        $article->save();
        return response()->json(array(['type' => 'success', 'message' => 'Noticia creada correctamente']));
    }

    /*Para visualizar las noticias nuevas*/
    public function view($id){
        $article_exists = Noticias::where('id','=',$id)->get()->count() > 0;
        if(!$article_exists){
            return back()->with('error','La noticia que estas buscando no existe');
        }
        $article = Noticias::find($id);
        return View('admin.noticias.ver')->with('articulo',$article);
    }
}
