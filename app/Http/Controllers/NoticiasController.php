<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Noticias;
use App\ArchivoNoticia;
use DB;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Noticias::orderBy('created_at','desc')->get();
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

         //Codigo para guardar archivos
        if(!Storage::has('noticias/archivos')){
            Storage::makeDirectory('noticias/archivos');
        }

        if($request->has('archivos')){

            // Creamos un arrelglo con las extemsiones validas
            $allowedfileExtension=['pdf','xls','xlsx','docx','doc'];
            for ($i = 0; $i < count($request->archivos); $i++) {
               $file = $request->archivos[$i];
               // Obtenemos la extension original del archivo
               $extension = strtolower($file->getClientOriginalExtension());
               // Funcion para saber si la extension se encuentra dentro de las extensiones permitidas
               $check=in_array($extension,$allowedfileExtension);
               if(!$check){
                   return response()->json(array(['type' => 'error', 'message' => 'La extension '. $extension.' no es valida']));
               }
            }
        }

        if($request->has('imagen')){
            $file = $request->imagen;
            $imageExtension = $file->getClientOriginalExtension();
            $imageExtension = strtolower($imageExtension);
            if($imageExtension == 'jpg' || $imageExtension == 'png' || $imageExtension == 'jpeg'){
                $path = storage_path().'/app/public/noticias/imagenes/';
                //Cambiar el nombre original por uno diferente en el servidor
                $name = 'noticia_'.time().'.'.strtolower($imageExtension);
                //$name =
                $file->move($path,$name);
                Storage::delete(['public/noticias/imagenes/'.$article->imagen]);
                $article->imagen = $name;
            }else{
                return response()->json(array(['type' => 'error', 'message' => 'La extension '.$imageExtension.' no es valida']));
            }
        }


        if($request->has('archivos'))//Validamos si existe un archivo
        {
            DB::table('archivos_noticias')->where('id_not', '=', $id)->delete();
            //Generamos la ruta donde se guardaran las imagenes de los articulos
            Storage::deleteDirectory('public/noticias/archivos/'.$article->id);
            $path=storage_path().'/app/public/noticias/archivos/'.$article->id.'/';
            $path_to_verify = 'public/noticias/archivos/'.$article->id;
            if(!Storage::has($path_to_verify)){
                Storage::makeDirectory($path_to_verify);
            }
            for ($i = 0; $i < count($request->archivos) ; $i++) {
                //En el metodo file ponemos el nombre del campo file que pusimos en la vista, que sera el que tenga los datos de la imagen
                $file=$request->archivos[$i];
                //Para evitar nombres repetidos en las imagenes, creamos un nombre antes de guardar
                //$name='noticiasFile_'.time().'_'.$i.'.'.strtolower($file->getClientOriginalExtension());
                $name=$file->getClientOriginalName();//Obtenemos el nombre original de los archivos
                //Verificamos que el tamaño del nombre sea menor a 50 caracteres
                if(strlen($name)<50){
                    //Guardamos la imagen en la carpeta creada en la ruta que marcamos anteriormente
                    $file->move($path,$name);
                }
                else{
                    return response()->json(array(['type' => 'error', 'message' => 'El nombre del archivo '.$name.' es demasiado largo']));
                }

                $fileNot=new ArchivoNoticia(); //Obtiene todos los datos de la evidencia de la vista create
                $fileNot->id_not=$article->id;
                $fileNot->nom_archivo=$name;//Obtiene el nombre de la imagen para guardarlo en la bd
                $fileNot->save();//Guarda la evidencia en su tabla

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
        Storage::delete('public/noticias/imagenes/'.$article->imagen);
        Storage::deleteDirectory('public/noticias/archivos/'.$article->id);
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
                //Cambiar nombre por uno diferente en el servidor
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
        //$article->save();


        //Codigo para guardar archivos
        if(!Storage::has('noticias/archivos')){
            Storage::makeDirectory('noticias/archivos');
        }

        if($request->has('archivos')){
            // Creamos un arrelglo con las extemsiones validas
            $allowedfileExtension=['pdf','xls','xlsx','docx','doc'];
            for ($i = 0; $i < count($request->archivos); $i++) {
               $file = $request->archivos[$i];
               // Obtenemos la extension original del archivo
               $extension = strtolower($file->getClientOriginalExtension());
               // Funcion para saber si la extension se encuentra dentro de las extensiones permitidas
               $check=in_array($extension,$allowedfileExtension);
               if(!$check){
                   return response()->json(array(['type' => 'error', 'message' => 'La extension '. $extension.' no es valida']));
               }
            }
        }


        if($request->has('archivos'))//Validamos si existe un archivo
        {

           //Modificamos la noticia para saber que tiene archivos agregados
           $article->arch_adj = 1;
           $article->save();
           //return response()->json($request->has('archivos')); Comentario para consola AJAX
            //Generamos la ruta donde se guardaran los archivos de las noticias
            $path=storage_path().'/app/public/noticias/archivos/'.$article->id.'/';
            $path_to_verify = 'public/noticias/archivos/'.$article->id;
            if(!Storage::has($path_to_verify)){
                Storage::makeDirectory($path_to_verify);
            }
            for ($i = 0; $i < count($request->archivos) ; $i++) {
                //En el metodo file ponemos el nombre del campo file que pusimos en la vista, que sera el que tenga los datos de la imagen
                $file=$request->archivos[$i];
                //Para evitar nombres repetidos en las noticias, creamos un nombre antes de guardar
                //$name='noticiasFile_'.time().'_'.$i.'.'.strtolower($file->getClientOriginalExtension());
                $name=$file->getClientOriginalName();//Obtenemos el nombre original de los archivos
                //Guardamos la imagen en la carpeta creada en la ruta que marcamos anteriormente
                $file->move($path,$name);

                $fileNot=new ArchivoNoticia(); //Obtiene todos los datos de la evidencia de la vista create
                $fileNot->id_not=$article->id;
                $fileNot->nom_archivo=$name;//Obtiene el nombre de la imagen para guardarlo en la bd
                $fileNot->save();//Guarda la evidencia en su tabla

            }

        }
        else
        {
             $article->save();
        }
        return response()->json(array(['type' => 'success', 'message' => 'Noticia creada correctamente']));
    }



    /*Para visualizar las noticias nuevas*/
    public function view($id){
        $article_exists = Noticias::where('id','=',$id)->get()->count() > 0;
        if(!$article_exists){
            return back()->with('error','La noticia que estas buscando no existe');
        }
        $article = Noticias::find($id);
        $archivos=ArchivoNoticia::where('id_not','=',$id)->get();

        return View('admin.noticias.ver')
        ->with('archivos',$archivos)
        ->with('articulo',$article);
    }

}
