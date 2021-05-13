<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
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





class CarrerasController extends Controller
{
    //Mostramos una carrera inicial
    public function index()
    {
        $idPro=Programa::first('id');
        if (empty($idPro))
        {
            return view('admin.contenido.carreras.inicializar');
        }
        $archivos=Archivo::where('id_programa',$idPro->id)->get(); 
        $programas=DB::table('programas')->select('id','nombre')->get();
        $pro_act=Programa::find($idPro->id);
        $especialidades= Especialidad::where('especialidades.id_programa', $idPro->id)
        ->join('reticulas', 'especialidades.id', '=', 'reticulas.id_especialidad')        
        ->select('especialidades.id','especialidades.nombre','especialidades.clave','especialidades.objetivo', 'reticulas.nom_arch_ret')
        ->get();
        $objetivos=Objetivo::where('id_programa',$idPro->id)->get();
        $atributos=Atributo::select('atributos.id as idAtr','atributos.numero as numAtr','atributos.descripcion as desAtr','criterios.id as idCri', 'criterios.numero as numCri','criterios.descripcion as desCri')
        ->leftjoin('criterios', 'atributos.id', '=', 'criterios.id_atributos')
        ->where('atributos.id_programa',$idPro->id)
        ->get();       
        $personal=Personal::where('id_programa',$idPro->id)->get();
        $formacion=Formacion::all();
        $productos=Producto::all();
        //Cuenta los mensajes sin leer del programa
        $n_msg=Contactos::where('id_programa',$idPro->id)
        ->where('status',0)
        ->count();       
        return view('admin.contenido.carreras.index')
        ->with('programas',$programas)
        ->with('pro_act',$pro_act)
        ->with('especialidades',$especialidades)
        ->with('objetivos',$objetivos)
        ->with('atributos',$atributos)
        ->with('personal',$personal)
        ->with('formacion',$formacion)
        ->with('productos',$productos)
        ->with('n_msg',$n_msg)
        ->with('archivos',$archivos);
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
        return view('admin.contenido.carreras.index')
        ->with('programas',$programas)
        ->with('pro_act',$pro_act)
        ->with('especialidades',$especialidades)
        ->with('objetivos',$objetivos)
        ->with('atributos',$atributos)
        ->with('personal',$personal)
        ->with('formacion',$formacion)
        ->with('productos',$productos)
        ->with('n_msg',$n_msg)
        ->with('archivos',$archivos);
    }

    //Metodo que inicializa la BD con la primera carrera
    public function inicializar(Request $request)
    {
        $programa = new Programa($request->input());
        $programa->save();
        $idPro=Programa::first('id');
        $programas=DB::table('programas')->select('id','nombre')->get();
        $pro_act=Programa::find($idPro->id);
        $especialidades= Especialidad::where('especialidades.id_programa', $idPro->id)
        ->join('reticulas', 'especialidades.id', '=', 'reticulas.id_especialidad')        
        ->select('especialidades.id','especialidades.nombre','especialidades.clave','especialidades.objetivo', 'reticulas.nom_arch_ret')
        ->get();
        $objetivos=Objetivo::where('id_programa',$idPro->id)->get();
        $atributos=Atributo::select('atributos.id as idAtr','atributos.numero as numAtr','atributos.descripcion as desAtr','criterios.id as idCri', 'criterios.numero as numCri','criterios.descripcion as desCri')
        ->leftjoin('criterios', 'atributos.id', '=', 'criterios.id_atributos')
        ->where('atributos.id_programa',$idPro->id)
        ->get();
        $personal=Personal::where('id_programa',$idPro->id)->get();
        $n_msg=Contactos::where('id_programa',$idPro->id)
        ->where('status',0)
        ->count(); 
        $archivos=Archivo::where('id_programa',$idPro->id)->get(); 
        return view('admin.contenido.carreras.index')
        ->with('programas',$programas)
        ->with('pro_act',$pro_act)
        ->with('especialidades',$especialidades)
        ->with('objetivos',$objetivos)
        ->with('atributos',$atributos)
        ->with('personal',$personal)
        ->with('n_msg',$n_msg)
        ->with('archivos',$archivos);
    }

    /*Metodo para agregar y editar los programas educativos de la institución */
    public function editCarrera()
    {
        $programas=Programa::all();
        return view('admin.contenido.carreras.editcarreras')->with('programas',$programas);
    }

    /*Metodo para agregar los programas educativos de la institución */
    public function storeCarrera(Request $request)
    {
        $programa = new Programa;
        $programa->nombre = $request->nombre;
        $programa->save();
        return redirect()->route('carreras.editCarrera');
    }

    /*Metodo para modificar solo el nombre del programa educativo de la institución */
    public function updateCarrera(Request $request, $id)
    {
        $programa = Programa::find($id);
        $programa->nombre = $request->nombre;
        $programa->save();
        return redirect()->route('carreras.editCarrera');
    }

    /*Metodo para eliminar los programas educativos de la institución */
    public function destroyCarrera($id)
    {
        $programa = Programa::find($id);
        $programa->delete();
        return redirect()->route('carreras.editCarrera');
    }

    //Metodo para agregar contenido a los programas educativos
    public function updatecarreracom(Request $request, $id_pro)
    {
        $carrera = Programa::find($id_pro);
        $carrera->plan_estudios = $request->plan_estudios;
        $carrera->definicion = $request->definicion;
        $carrera->mision = $request->mision;
        $carrera->vision = $request->vision;
        $carrera->politica = $request->politica;
        $carrera->objetivo = $request->objetivo;
        $carrera->per_ingreso = $request->per_ingreso;
        $carrera->per_egreso = $request->per_egreso;
        $carrera->campo = $request->campo;
        $carrera->save();    
        
        //Codigo para cargar el logo de las carreras
        if(!Storage::has('public/carreras_imagenes')){
            Storage::makeDirectory('public/carreras_imagenes');
        }      
        if($request->has('logo')){
            $file =$request->logo;                                  
            $imageExtension = $file->getClientOriginalExtension();
            $imageExtension = strtolower($imageExtension);
            if($imageExtension == 'jpg' || $imageExtension == 'png' || $imageExtension == "jpeg"){
                $path = storage_path().'/app/public/carreras_imagenes/';
                $name = 'logo'.time().'.'.strtolower($imageExtension);
                $file->move($path,$name);
                Archivo::updateOrCreate(
                    ['id_programa'=>$id_pro],
                    ['nom_img_carr'=>$name,
                     'id_programa'=>$id_pro]
                );               
            }else{
                return response()->json(array(['type' => 'error', 'message' => 'La extension '.$imageExtension.' no es valida']));
            }
        }  

        
        //Codigo para cargar los archivos de las carreras
        if(!Storage::has('public/carreras_archivos')){
            Storage::makeDirectory('public/carreras_archivos');
        }      
        if($request->has('piid')){
            $file =$request->piid;                                  
            $archExtension = $file->getClientOriginalExtension();
            $archExtension = strtolower($archExtension);
            if($archExtension == 'pdf' || $archExtension == 'doc' || $archExtension == "docx" || $archExtension == "xls" || $archExtension == "xlsx"){
                $path = storage_path().'/app/public/carreras_archivos/';
                $name = 'piid'.time().'.'.strtolower($archExtension);
                $file->move($path,$name);
                Archivo::updateOrCreate(
                    ['id_programa'=>$id_pro],
                    ['nom_arch_piid'=>$name,
                     'id_programa'=>$id_pro]
                );               
            }else{
                return response()->json(array(['type' => 'error', 'message' => 'La extension '.$archExtension.' no es valida']));
            }
        }  

        //Archivo de imagen de acreditación
        if($request->has('acreditacion')){
            $file =$request->acreditacion;                                  
            $archExtension = $file->getClientOriginalExtension();
            $archExtension = strtolower($archExtension);
            if($archExtension == 'pdf'){
                $path = storage_path().'/app/public/carreras_archivos/';
                $name = 'acreditacion'.time().'.'.strtolower($archExtension);
                $file->move($path,$name);
                Archivo::updateOrCreate(
                    ['id_programa'=>$id_pro],
                    ['nom_arch_acred'=>$name,
                     'id_programa'=>$id_pro]
                );               
            }else{
                return response()->json(array(['type' => 'error', 'message' => 'La extension '.$archExtension.' no es valida']));
            }
        }  
        return back()->withInput();
    }


    //Sección de Especialidades

    /*Edicion de especialidades*/
    public function editEspecialidad($id)
    {
        $programa=Programa::find($id);
        $especialidades= Especialidad::where('especialidades.id_programa', $id)
        ->join('reticulas', 'especialidades.id', '=', 'reticulas.id_especialidad')        
        ->select('especialidades.id','especialidades.nombre','especialidades.clave','especialidades.objetivo', 'reticulas.nom_arch_ret')
        ->get();        
    
        return view('admin.contenido.carreras.editespecialidades')
        ->with('especialidades',$especialidades)
        ->with('programa',$programa);
    }

    /*Metodo para agregar los programas educativos de la institución */
    public function storeEspecialidad(Request $request)
    { 
        //Iniciamos la transacción
        DB::beginTransaction();
        try 
        {
            $especialidad = new Especialidad();
            $especialidad->nombre = $request->nombre;
            $especialidad->clave = $request->clave;
            $especialidad->objetivo = $request->objetivo;
            $especialidad->id_programa = $request->id_programa;
            $especialidad->save();

            //Obtener el ultimo ID de las especialidades
            $id_esp = Especialidad::latest('id')->first();
            //Codigo para cargar los archivos de las carreras
            if(!Storage::has('public/carreras_archivos')){
            Storage::makeDirectory('public/carreras_archivos');
            }      
            if($request->has('reticula')){
                $file =$request->reticula;                                  
                $archExtension = $file->getClientOriginalExtension();
                $archExtension = strtolower($archExtension);
                if($archExtension == 'pdf' ){
                    $path = storage_path().'/app/public/carreras_archivos/';
                    $name = 'reticula'.time().'.'.strtolower($archExtension);
                    $file->move($path,$name);
                    //Guardamos el nombre de la retícula
                    $reticula = new Reticula;
                    $reticula->id_programa = $request->id_programa;
                    $reticula->nom_arch_ret = $name;
                    $reticula->id_especialidad=$id_esp->id;
                    $reticula->save();                             
                }else{
                    return response()->json(array(['type' => 'error', 'message' => 'La extension '.$archExtension.' no es valida']));
                }
            } 
        }    
        // Ha ocurrido un error, devolvemos la BD a su estado previo y hacemos lo que queramos con esa excepción
        catch (\Exception $e)
        {        
            DB::rollback();                
            return response()->json(array(['type' => 'error', 'message' => 'A ocurrido un error '.$e]));
        }
        // Hacemos los cambios permanentes ya que no han habido errores
        DB::commit(); 
        return redirect()->route('carreras.editEspecialidad',$request->id_programa);
    }

    /*Metodo para modificar especialidades */
    public function updateEspecialidad(Request $request,$id)
    {
        $especialidad = Especialidad::find($id);
        $especialidad->nombre = $request->nombre;
        $especialidad->clave = $request->clave;
        $especialidad->objetivo = $request->objetivo;
        $especialidad->id_programa = $request->id_programa;
        $especialidad->save();
        return redirect()->route('carreras.editEspecialidad',$request->id_programa);
    }

    /*Metodo para eliminar especialidades */
    public function destroyEspecialidad(Request $request, $id)
    {
        $especialidad = Especialidad::where('id',$id)->where('id_programa',$request->id_programa);
        $especialidad->delete();
        return redirect()->route('carreras.editEspecialidad',$request->id_programa);
    }

    //Sección de objetivos educacionales

    /*Edicion de especialidades*/
    public function editObjetivos($id)
    {
        $programa=Programa::find($id);
        $objetivos=Objetivo::where('id_programa', $id)->get();
        return view('admin.contenido.carreras.editobjetivos')
        ->with('objetivos',$objetivos)
        ->with('programa',$programa);
    }

    /*Metodo para agregar los programas educativos de la institución */
    public function storeObjetivos(Request $request)
    {
        $objetivo = new Objetivo();
        $objetivo->descripcion = $request->descripcion;
        $objetivo->criterio = $request->criterio;
        $objetivo->indicador = $request->indicador;
        $objetivo->id_programa = $request->id_programa;
        $objetivo->save();
        return redirect()->route('carreras.editObjetivos',$request->id_programa);
    }

    /*Metodo para modificar objetivos */
    public function updateObjetivos(Request $request,$id)
    {
        $objetivo = Objetivo::find($id);
        $objetivo->descripcion = $request->descripcion;
        $objetivo->criterio = $request->criterio;
        $objetivo->indicador = $request->indicador;
        $objetivo->id_programa = $request->id_programa;
        $objetivo->save();
        return redirect()->route('carreras.editObjetivos',$request->id_programa);
    }

    /*Metodo para eliminar objetivos */
    public function destroyObjetivos(Request $request, $id)
    {
        $objetivo = Objetivo::where('id',$id)->where('id_programa',$request->id_programa);
        $objetivo->delete();
        return redirect()->route('carreras.editObjetivos',$request->id_programa);
    }


    //Sección de atributos

   /*Edicion de especialidades*/
   public function editAtributos($id_pro)
   {
       $programa=Programa::find($id_pro);

       $atributos=Atributo::select('atributos.id as idAtr','atributos.numero as numAtr','atributos.descripcion as desAtr','criterios.id as idCri', 'criterios.numero as numCri','criterios.descripcion as desCri')
       ->leftjoin('criterios', 'atributos.id', '=', 'criterios.id_atributos')
       ->where('atributos.id_programa',$id_pro)
       ->get();

       return view('admin.contenido.carreras.editatributos')
       ->with('atributos',$atributos)
       ->with('programa',$programa);

   }

   /*Metodo para agregar los programas educativos de la institución */
   public function storeAtributos(Request $request)
   {
       $atributo = new Atributo();
       $atributo->numero = $request->numero;
       $atributo->descripcion = $request->descripcion;
       $atributo->id_programa = $request->id_programa;
       $atributo->save();
       return redirect()->route('carreras.editAtributos',$request->id_programa);
   }

   /*Metodo para modificar atributos */
   public function updateAtributos(Request $request,$id)
   {
       $atributo = Atributo::find($id);
       $atributo->numero = $request->numAtr;
       $atributo->descripcion = $request->desAtr;
       $atributo->id_programa = $request->id_programa;
       $atributo->save();
       return redirect()->route('carreras.editAtributos',$request->id_programa);
   }

   /*Metodo para eliminar atributos */
   public function destroyAtributos(Request $request, $id)
   {
       $atributo = Atributo::where('id',$id)->where('id_programa',$request->id_programa);
       $atributo->delete();
       return redirect()->route('carreras.editAtributos',$request->id_programa);
   }


   //Sección de Criterios

   /*Metodo para agregar los criterios */
   public function storeCriterios(Request $request)
   {
       $atributo = new Criterio();
       $atributo->numero = $request->numero;
       $atributo->descripcion = $request->descripcion;
       $atributo->id_atributos = $request->id_atributos;
       $atributo->save();
       return redirect()->route('carreras.editAtributos',$request->id_programa);
   }

    /*Metodo para modificar criterios */
    public function updateCriterios(Request $request,$id)
    {
        $criterio = Criterio::find($id);
        $criterio->numero = $request->numCri;
        $criterio->descripcion = $request->desCri;
        $criterio->save();
        return redirect()->route('carreras.editAtributos',$request->id_programa);
    }

    /*Metodo para eliminar criterios */
    public function destroyCriterios(Request $request, $id)
    {
        $criterio = Criterio::find($id);
        $criterio->delete();
        return redirect()->route('carreras.editAtributos',$request->id_programa);
    }

    //Sección de Estructura academica

   /*Edicion estructura académica*/
   public function editEstructura($id_pro)
   {
       $programa=Programa::find($id_pro);
       $personal=Personal::where('id_programa',$id_pro)->get();
       $formacion=Formacion::all();
       $productos=Producto::all();

       return view('admin.contenido.carreras.editestructura')
       ->with('personal',$personal)
       ->with('programa',$programa)
       ->with('formacion',$formacion)
       ->with('productos',$productos);

   }

   /*Metodo para agregar estructura académica*/
   public function storeEstructura(Request $request)
   {
       //Guarda todos los campos en una sola linea
       $personal = new Personal($request->input());
       $personal->save();
       return redirect()->route('carreras.editEstructura',$request->id_programa);
   }

   /*Metodo para modificar profesores */
   public function updateEstructura(Request $request,$id)
   {
        $personal = Personal::where ('id', $id)->first();
        $personal->fill($request->all());
        $personal->save();
        return redirect()->route('carreras.editEstructura',$request->id_programa);
   }

   /*Metodo para eliminar Profesores */
   public function destroyEstructura(Request $request, $id)
   {
       $personal = Personal::where('id',$id)->where('id_programa',$request->id_programa);
       $personal->delete();
       return redirect()->route('carreras.editEstructura',$request->id_programa);
   }


   //Sección de Detalles de estructura academica

   //Metodo para llamar la vista de ddetalle y editar formación y productos
   public function editDetalles($id_pro,$id_per)
   {
       $programa=Programa::find($id_pro);
       $formacion=Formacion::where('id_personal',$id_per)->get();
       $productos=Producto::where('id_personal',$id_per)->get();
       $personal=Personal::find($id_per);

       return view('admin.contenido.carreras.editdetalleestructura')
       ->with('programa',$programa)
       ->with('formacion',$formacion)
       ->with('productos',$productos)
       ->with('personal',$personal);

   }

   /*Metodo para agregar la formación academica de los profesores */
   public function storeDetallesFor(Request $request)
   {
       $formacion = new Formacion($request->input());
       $formacion->save();
       return redirect()->route('carreras.editEstructura',$request->id_programa);
   }

    /*Metodo para agregar la producción academica de los profesores */
    public function storeDetallesPro(Request $request)
    {
        $produccion = new Producto($request->input());
        $produccion->save();
        return redirect()->route('carreras.editEstructura',$request->id_programa);
    }

    /*Metodo para modificar Formación académica */
    public function updateDetallesFormacion(Request $request,$id)
    {   
        $formacion = Formacion::where ('id', $id)->first();
        $formacion->fill($request->all());
        $formacion->save();
        return redirect()->route('carreras.editEstructura',$request->id_programa);

    }

    /*Metodo para eliminar formación */
    public function destroyDetallesFormacion(Request $request, $id)
    {
        $formacion = Formacion::find($id);
        $formacion->delete();
        return redirect()->route('carreras.editEstructura',$request->id_programa);
    }

     /*Metodo para modificar Producción académica */
     public function updateDetallesProduccion(Request $request,$id)
     {   
         $produccion = Producto::where ('id', $id)->first();
         $produccion->fill($request->all());
         $produccion->save();
         return redirect()->route('carreras.editEstructura',$request->id_programa);
 
     }
 
     /*Metodo para eliminar Producción */
     public function destroyDetallesProduccion(Request $request, $id)
     {
         $produccion = Producto::find($id);
         $produccion->delete();
         return redirect()->route('carreras.editEstructura',$request->id_programa);
     }

     /*Sección para mensajes */

     //Metodo para dar de alta mensajes de contacto
     public function storeContacto(Request $request, $id_pro)
     {
        $contacto = new Contactos($request->input());
        $contacto->save();
        return redirect()->route('carreras.showCarrera',$id_pro);
     }

    //Metodo para mostrar los mensajes que se han escrito al programa
    public function showContacto($id)
    {
        $msgs=Contactos::where('id_programa',$id)
        ->where('status',0)
        ->get();
        $programa=Programa::where('id',$id)->get();
        return view('admin.contenido.carreras.showMensajes')
        ->with('msgs',$msgs)
        ->with('programa',$programa);
    }

     //Metodo para mostrar los mensajes que se han escrito al programa
     public function showContactoLeido($id)
     {
         $msgs=Contactos::where('id_programa',$id)
         ->where('status',1)
         ->get();
         $programa=Programa::where('id',$id)->get();
         return view('admin.contenido.carreras.showMensajes')
         ->with('msgs',$msgs)
         ->with('programa',$programa);
     }    

    //Función para marcar mensajes leidos
    public function updateContacto(Request $request,$id_pro)
    {   
        $newMsg=Contactos::find($request->id);       
        $newMsg->status=1;
        $newMsg->save();
        return redirect()->route('carreras.showContacto',$id_pro);
    }
   
    //Función para borrar mensajes leidos
    public function destroyContacto(Request $request,$id_pro)
    {   
        $delMsg=Contactos::find($request->id);       
        $delMsg->delete();       
        return redirect()->route('carreras.showContacto',$id_pro);
    }
}
