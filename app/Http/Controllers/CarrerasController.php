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
use App\Models\Asignatura_programa;
use App\Models\Materia_especialidad;
use Illuminate\Support\Facades\Auth;




class CarrerasController extends Controller
{

    //Mostramos una carrera inicial
    public function index()
    {
        //Verificamos que el usuario tenga permisos
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }

        //Seleccionamos la carrera que este en la primera posición
        $idPro=Programa::first('id');

        //Si no existe ninguna carrera llamamos al metodo para inicializar al menos una
        if (empty($idPro))
        {
            return view('admin.contenido.carreras.inicializar');
        }

        //Seleccionamos la especialidad que este en la primera posicion
        $idEsp=Especialidad::first('id');

        //Seleccionamos los datos del programa seleccionado
        $programa=Programa::where('id',$idPro->id)->get();

        //Materias de tronco comun para el plan de estudios
        $mat_com=Asignatura_programa::where('id_programa',$idPro->id)->get();

        //Materias de especialidad del programa seleccionado
        $materias_esp=Programa::join('especialidades','especialidades.id_programa', 'programas.id')
        ->join('materias_especialidad','materias_especialidad.id_especialidad','especialidades.id')
        ->select('programas.id','especialidades.id as id_especialidad','especialidades.nombre as esp_nombre','materias_especialidad.*')
        ->where('especialidades.id',$idEsp->id)
        ->get();

        //Seleccionamos los archivos de cada carrera como su reticula, etc.
        $archivos=Archivo::where('id_programa',$idPro->id)->get();

        //Seleccionamos el nombre de todos las carreras
        $programas=DB::table('programas')->select('id','nombre')->get();

        //Identificamos cual es la carrera que esta seleccionada actualmente
        $pro_act=Programa::find($idPro->id);

        //Consulta las especialidades del programa
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
        ->with('archivos',$archivos)
        //Datos del plan de estudios
        ->with('programa',$programa)
        ->with('materias_esp',$materias_esp)
        ->with('mat_com',$mat_com);

    }

    //Mostramos carrera especifica
    public function show($id)
    {
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }

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
        ->with('archivos',$archivos)
        //Datos del plan de estudios
        ->with('programa',$programa)
        ->with('materias_esp',$materias_esp)
        ->with('mat_com',$mat_com);
    }

    //Metodo que inicializa la BD con la primera carrera y su especialidad
    public function inicializar(Request $request)
    {
        if(Auth::User()->tipo != "Administrador"){
            return redirect()->route('home');
        }
        //Iniciamos la transacción
        DB::beginTransaction();
        try
        {
            //Creamos la primera carrera
            $programa = new Programa;
            $programa->nombre = $request->nombre;
            $programa->save();

            //Obtenemos el id de la primera especialidad registrada
            $idPro=Programa::first('id');

            //Guardamos la primera especialidad
            $especialidad = new Especialidad;
            $especialidad->nombre = $request->nom_esp;
            $especialidad->clave = $request->cla_esp;
            $especialidad->objetivo = $request->obj_esp;
            $especialidad->id_programa = $idPro->id;
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
                     $reticula->id_programa = $idPro->id;
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


        //Datos de las materias de cada especialidad
        $materias_esp=Materia_especialidad::rightJoin('especialidades','materias_especialidad.id_especialidad','especialidades.id')
        ->select('especialidades.id as id_especialidad','especialidades.id_programa as id_programaEsp','especialidades.nombre as esp_nombre','materias_especialidad.*')
        ->having('especialidades.id_programa',$idPro->id)->groupBy('especialidades.id','materias_especialidad.id')->get();

        //Datos para el plan de estudios
        $programa=Programa::where('programas.id',$idPro->id)
        ->join('asignaturas_programa', 'programas.id', '=', 'asignaturas_programa.id_programa')
        ->select('programas.id as id_pro','programas.nombre as nom_pro','asignaturas_programa.*')
        ->get();

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
        ->with('programa',$programa)
        ->with('pro_act',$pro_act)
        ->with('especialidades',$especialidades)
        ->with('objetivos',$objetivos)
        ->with('atributos',$atributos)
        ->with('personal',$personal)
        ->with('n_msg',$n_msg)
        ->with('archivos',$archivos)
        ->with('materias_esp',$materias_esp);
    }



    /*Metodo para agregar y editar los programas educativos de la institución */
    public function editCarrera()
    {
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }
        $programas=Programa::all();
        return view('admin.contenido.carreras.editcarreras')->with('programas',$programas);
    }

    /*Metodo para agregar los programas educativos de la institución */
    public function storeCarrera(Request $request)
    {
        if(Auth::User()->tipo != "Administrador"){
            return redirect()->route('home');
        }

        $programa = new Programa;
        $programa->nombre = $request->nombre;
        $programa->save();
        return redirect()->route('carreras.editCarrera');
    }

    /*Metodo para modificar solo el nombre del programa educativo de la institución */
    public function updateCarrera(Request $request, $id)
    {
        if(Auth::User()->tipo != "Administrador"){
            return redirect()->route('home');
        }

        $programa = Programa::find($id);
        $programa->nombre = $request->nombre;
        $programa->save();
        return redirect()->route('carreras.editCarrera');
    }

    /*Metodo para eliminar los programas educativos de la institución */
    public function destroyCarrera($id)
    {
        if(Auth::User()->tipo != "Administrador"){
            return redirect()->route('home');
        }

        $programa = Programa::find($id);
        $programa->delete();
        return redirect()->route('carreras.editCarrera');
    }

    //Metodo para agregar contenido a los programas educativos
    public function updatecarreracom(Request $request, $id_pro)
    {
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }

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
                    ['nom_img_carr'=>$name]
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
                    ['nom_arch_piid'=>$name]
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
                    ['nom_arch_acred'=>$name]
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
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }

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
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }

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
    public function updateEspecialidad(Request $request,$id_esp)
    {
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }

        //Iniciamos la transacción
        DB::beginTransaction();
        try
        {
            $especialidad = Especialidad::find($id_esp);
            $especialidad->nombre = $request->nombre;
            $especialidad->clave = $request->clave;
            $especialidad->objetivo = $request->objetivo;
            $especialidad->id_programa = $request->id_programa;
            $especialidad->save();

            if(!Storage::has('public/carreras_archivos')){
                Storage::makeDirectory('public/carreras_archivos');
            }
            $reticula = Reticula::where('id_especialidad',$id_esp)->get();
            if($reticula==NULL){
                return response()->json(array(['type' => 'error', 'message' => 'El articulo no existe']));
            }
            if($request->has('reticula')){
                $file = $request->reticula;
                $imageExtension = $file->getClientOriginalExtension();
                $imageExtension = strtolower($imageExtension);
                if($imageExtension == 'pdf'){
                    $path = storage_path().'/app/public/carreras_archivos/';
                    $name = 'reticula'.time().'.'.strtolower($imageExtension);
                    $file->move($path,$name);
                    Storage::delete(['public/carreras_archivos/'.$reticula[0]->nom_arch_ret]);
                    $reticula = Reticula::where('id_especialidad',$id_esp)
                    ->update(['nom_arch_ret' => $name]);
                }else{
                    return response()->json(array(['type' => 'error', 'message' => 'La extension '.$imageExtension.' no es valida']));
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


    /*Metodo para eliminar especialidades */
    public function destroyEspecialidad(Request $request, $id_esp)
    {
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }

        //Iniciamos la transacción
        DB::beginTransaction();
        try
        {
            $reticula = Reticula::where('id_especialidad',$id_esp)->first();

            $especialidad = Especialidad::where('id',$id_esp)->where('id_programa',$request->id_programa);
            $especialidad->delete();

            if($reticula==NULL){
                return response()->json(array(['type' => 'error', 'message' => 'A ocurrido un error ']));
            }
            //Borramos el archivo de la reticula
            Storage::delete(['public/carreras_archivos/'.$reticula->nom_arch_ret]);
            Reticula::where('id_especialidad',$id_esp)->delete();
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

    //Sección de objetivos educacionales

    /*Edicion de especialidades*/
    public function editObjetivos($id)
    {
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }

        $programa=Programa::find($id);
        $objetivos=Objetivo::where('id_programa', $id)->get();
        return view('admin.contenido.carreras.editobjetivos')
        ->with('objetivos',$objetivos)
        ->with('programa',$programa);
    }

    /*Metodo para agregar los programas educativos de la institución */
    public function storeObjetivos(Request $request)
    {
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }

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
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }

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
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }

        $objetivo = Objetivo::where('id',$id)->where('id_programa',$request->id_programa);
        $objetivo->delete();
        return redirect()->route('carreras.editObjetivos',$request->id_programa);
    }


    //Sección de atributos

   /*Edicion de especialidades*/
   public function editAtributos($id_pro)
   {
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }

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
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }
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
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }
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
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }
        $atributo = Atributo::where('id',$id)->where('id_programa',$request->id_programa);
        $atributo->delete();
        return redirect()->route('carreras.editAtributos',$request->id_programa);
   }


   //Sección de Criterios

   /*Metodo para agregar los criterios */
   public function storeCriterios(Request $request)
   {
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }
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
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }
        $criterio = Criterio::find($id);
        $criterio->numero = $request->numCri;
        $criterio->descripcion = $request->desCri;
        $criterio->save();
        return redirect()->route('carreras.editAtributos',$request->id_programa);
    }

    /*Metodo para eliminar criterios */
    public function destroyCriterios(Request $request, $id)
    {
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }
        $criterio = Criterio::find($id);
        $criterio->delete();
        return redirect()->route('carreras.editAtributos',$request->id_programa);
    }

    //Sección de Estructura academica

   /*Edicion estructura académica*/
   public function editEstructura($id_pro)
   {
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }

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
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }
        //Guarda todos los campos en una sola linea
        $personal = new Personal($request->input());
        $personal->save();
        return redirect()->route('carreras.editEstructura',$request->id_programa);
   }

   /*Metodo para modificar profesores */
   public function updateEstructura(Request $request,$id)
   {
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }
        $personal = Personal::where ('id', $id)->first();
        $personal->fill($request->all());
        $personal->save();
        return redirect()->route('carreras.editEstructura',$request->id_programa);
   }

   /*Metodo para eliminar Profesores */
   public function destroyEstructura(Request $request, $id)
   {
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }
        $personal = Personal::where('id',$id)->where('id_programa',$request->id_programa);
        $personal->delete();
        return redirect()->route('carreras.editEstructura',$request->id_programa);
   }


   //Sección de Detalles de estructura academica

   //Metodo para llamar la vista de ddetalle y editar formación y productos
   public function editDetalles($id_pro,$id_per)
   {
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }
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

   //Funcion para guardar la foto del perfil
   public function act_foto(Request $request, $id_pro)
   {
        //Iniciamos la transacción
        DB::beginTransaction();
        try
        {
            $programa=Programa::find($id_pro);
            //Codigo para cargar los archivos de las carreras
            if(!Storage::has('public/carreras_imagenes/'.$programa->nombre.'/fotos_personal')){
                Storage::makeDirectory('public/carreras_imagenes/'.$programa->nombre.'/fotos_personal');
            }
            $personal=Personal::find($request->id_per);
            $nameV=$personal->nom_foto;
            if($request->has('foto')){
                $file =$request->foto;
                $archExtension = $file->getClientOriginalExtension();
                $archExtension = strtolower($archExtension);
                if($archExtension == 'jpg' || $archExtension == 'png' || $archExtension == "jpeg"){
                    //Eliminamos la foto vieja si existe
                    if($nameV!=null)
                    {
                        Storage::delete(['public/carreras_imagenes/'.$programa->nombre.'/fotos_personal/'.$nameV]);
                    }
                    $path = storage_path().'/app/public/carreras_imagenes/'.$programa->nombre.'/fotos_personal';
                    $name = 'foto'.time().'.'.strtolower($archExtension);
                    $file->move($path,$name);
                    //Guardamos el registro en la tabla personal
                    $personal = Personal::find($request->id_per);
                    $personal->nom_foto = $name;
                    $personal->save();
                }
                else
                {
                    return back()
                    ->with("error","La extension ".$archExtension." no es valida, solo se admiten extenciones de archivos: JPG, PNG, JPEG!");
                }
            }
        }
        // Ha ocurrido un error, devolvemos la BD a su estado previo y hacemos lo que queramos con esa excepción
        catch (\Exception $e)
        {dd($e);
            DB::rollback();
            return back()
            ->with("success","A ocurrido un error CODIGO_act_foto_858");
        }
        // Hacemos los cambios permanentes ya que no han habido errores
        DB::commit();
        //Regresamos a la pagina anterior
        return back()
        ->with("success","¡La foto se dio de alta correctamente!");
   }


   /*Metodo para agregar la formación academica de los profesores */
   public function storeDetallesFor(Request $request)
   {
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }

        $formacion = new Formacion($request->input());
        $formacion->save();
        return redirect()->route('carreras.editEstructura',$request->id_programa);
   }

    /*Metodo para agregar la producción academica de los profesores */
    public function storeDetallesPro(Request $request)
    {
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }

        $produccion = new Producto($request->input());
        $produccion->save();
        return redirect()->route('carreras.editEstructura',$request->id_programa);
    }

    /*Metodo para modificar Formación académica */
    public function updateDetallesFormacion(Request $request,$id)
    {
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }

        $formacion = Formacion::where ('id', $id)->first();
        $formacion->fill($request->all());
        $formacion->save();
        return redirect()->route('carreras.editEstructura',$request->id_programa);

    }

    /*Metodo para eliminar formación */
    public function destroyDetallesFormacion(Request $request, $id)
    {
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }

        $formacion = Formacion::find($id);
        $formacion->delete();
        return redirect()->route('carreras.editEstructura',$request->id_programa);
    }

     /*Metodo para modificar Producción académica */
     public function updateDetallesProduccion(Request $request,$id)
     {
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }
        $produccion = Producto::where ('id', $id)->first();
        $produccion->fill($request->all());
        $produccion->save();
        return redirect()->route('carreras.editEstructura',$request->id_programa);

     }

     /*Metodo para eliminar Producción */
     public function destroyDetallesProduccion(Request $request, $id)
     {
        if(Auth::User()->tipo != "Administrador" && Auth::User()->tipo != "Jefe de carrera"){
            return redirect()->route('home');
        }
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
        return redirect()->route('oferta.showCarrera',$id_pro)
        ->with('success','¡Tu mensaje se envió correctamente, en breve te responderemos!');
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

    /*Sección para plan de estudios */

    //Metodo para mostrar y editar el plan de estudios del programa
    public function editPlanEstudios(Request $request,$id_pro)
    {//Este ya esta correcto

        $programa=Programa::where('id',$id_pro)->get();

        $mat_com=Asignatura_programa::where('id_programa',$id_pro)->get();


        $especialidad=Especialidad::where('id_programa',$id_pro)->get();

        if(!$especialidad->isEmpty() && !isset($request->id_esp))
        {
            $materias_esp=Materia_especialidad::where('id_especialidad',$especialidad[0]->id)->get();
            $esp_act=Especialidad::where('id_programa',$id_pro)->get();

        } else if (isset($request->id_esp)) {
            $materias_esp=Programa::join('especialidades','especialidades.id_programa', 'programas.id')
            ->join('materias_especialidad','materias_especialidad.id_especialidad','especialidades.id')
            ->select('programas.id','especialidades.id as id_especialidad','especialidades.nombre as esp_nombre','materias_especialidad.*')
            ->where('especialidades.id',$request->id_esp)
            ->get();
            //$materias_esp=Materia_especialidad::where('id_especialidad',$request->id_esp)->get();
            $esp_act=Especialidad::where('id',$request->id_esp)->get();
        }
        else
        {
            return back()
            ->with('error','Primero debe registrarse una especialidad');
        }

        return view('admin.contenido.carreras.editplanestudios')
        ->with('programa',$programa)
        ->with('especialidad',$especialidad)
        ->with('materias_esp',$materias_esp)
        ->with('mat_com',$mat_com)
        ->with('esp_act',$esp_act)
        ->with('id_pro',$id_pro);

    }



    //Metodo para consultar las materias de la especialidad en index
    public function showMateriasEspecialidad2(Request $request, $id_pro)
    {
        $programa=Programa::where('id',$id_pro)->get();dd("showMateriasEspecialidad2");

        $programas=DB::table('programas')->select('id','nombre')->get();
        $pro_act=Programa::find($id_pro);
        //Cuenta los mensajes sin leer del programa
        $n_msg=Contactos::where('id_programa',$id_pro)
        ->where('status',0)
        ->count();
        $archivos=Archivo::where('id_programa',$id_pro)->get();
        //Consulta las especialidades del programa
        $especialidades= Especialidad::where('especialidades.id_programa', $id_pro)
        ->join('reticulas', 'especialidades.id', '=', 'reticulas.id_especialidad')
        ->select('especialidades.id','especialidades.nombre','especialidades.clave','especialidades.objetivo', 'reticulas.nom_arch_ret')
        ->get();
        $objetivos=Objetivo::where('id_programa',$id_pro)->get();
        $atributos=Atributo::select('atributos.id as idAtr','atributos.numero as numAtr','atributos.descripcion as desAtr','criterios.id as idCri', 'criterios.numero as numCri','criterios.descripcion as desCri')
        ->leftjoin('criterios', 'atributos.id', '=', 'criterios.id_atributos')
        ->where('atributos.id_programa',$id_pro)
        ->get();
        $personal=Personal::where('id_programa',$id_pro)->get();
        $formacion=Formacion::all();
        $productos=Producto::all();
        //Datos de materias de especialidad
        $materias_esp=Programa::join('especialidades','especialidades.id_programa', 'programas.id')
        ->join('materias_especialidad','materias_especialidad.id_especialidad','especialidades.id')
        ->select('programas.id','especialidades.id as id_especialidad','especialidades.nombre as esp_nombre','materias_especialidad.*')
        ->where('especialidades.id',$request->id_esp)
        ->get();
        //Fin de datos para el plan de estudios

        return view('admin.contenido.carreras.index')
        ->with('programa',$programa)
        ->with('programas',$programas)
        ->with('pro_act',$pro_act)
        ->with('n_msg',$n_msg)
        ->with('archivos',$archivos)
        ->with('especialidades',$especialidades)
        ->with('objetivos',$objetivos)
        ->with('atributos',$atributos)
        ->with('personal',$personal)
        ->with('formacion',$formacion)
        ->with('productos',$productos)
        ->with('materias_esp',$materias_esp);
    }

    //funcion para actualizar tabla de datos de las especialidades con ajax
    public function act_tab_esp($id_esp)
    {
         //Datos de materias de especialidad
         $materias_esp=Programa::join('especialidades','especialidades.id_programa', 'programas.id')
         ->join('materias_especialidad','materias_especialidad.id_especialidad','especialidades.id')
         ->select('programas.id','especialidades.id as id_especialidad','especialidades.nombre as esp_nombre','materias_especialidad.*')
         ->where('especialidades.id',$id_esp)
         ->get();

        //Seleccionamos los datos del programa seleccionado
        $pro_esp=Especialidad::select('id_programa')->where('id',$id_esp)->get();
        $programa=Programa::where('id',$pro_esp[0]->id_programa)->get();


         //Obtenemos la ruta del archivo de cada materia de especialidad
         $ruta = storage_path().'/app/public/carreras_planes_estudio/';
        foreach($materias_esp as $me){
            //$me->nom_archivo = $ruta . $me->nom_archivo;
            $me->link = asset('storage/carreras_planes_estudio/'.$programa[0]->nombre.'/especialidad/'.$me->nom_archivo);
        }
         return response()->json($materias_esp);
    }


    //Metodo para gusrdar las materias
    public function storePlanEstudios(Request $request, $id_pro)
    {
        //Iniciamos la transacción
        DB::beginTransaction();
        try
        {
            $programa=Programa::find($id_pro);
            //Codigo para cargar los archivos de las carreras
            if(!Storage::has('public/carreras_planes_estudio/'.$programa->nombre.'/tron_comun')){
                Storage::makeDirectory('public/carreras_planes_estudio/'.$programa->nombre.'/tron_comun');
            }
            if($request->has('nom_archivo')){
                $file =$request->nom_archivo;
                $archExtension = $file->getClientOriginalExtension();
                $archExtension = strtolower($archExtension);
                if($archExtension == 'pdf' || $archExtension == 'doc' || $archExtension == "docx"){
                    $path = storage_path().'/app/public/carreras_planes_estudio/'.$programa->nombre.'/tron_comun';
                    $name = $request->clave.'-'.$request->nombre.'.'.strtolower($archExtension);
                    $file->move($path,$name);
                    //Guardamos el registro en la tabla de asignaturas programa
                    $asignatura = new Asignatura_programa;
                    $asignatura->clave = $request->clave;
                    $asignatura->nombre = $request->nombre;
                    $asignatura->nom_archivo=$name;
                    $asignatura->id_programa=$id_pro;
                    $asignatura->save();
                }else{
                    return back()
                    ->with("error","La extension ".$archExtension." no es valida, solo se admiten extenciones de archivos: PDF, DOC, DOCX!");
                }
            }
        }
        // Ha ocurrido un error, devolvemos la BD a su estado previo y hacemos lo que queramos con esa excepción
        catch (\Exception $e)
        {   dd($e);
            DB::rollback();
            return back()
            ->with("success","A ocurrido un error CODIGO_001_1152");
        }
        // Hacemos los cambios permanentes ya que no han habido errores
        DB::commit();
        //return redirect()->route('carreras.editPlanEstudios',$id_pro);
        //Regresamos a la pagina anterior
        return back()
        ->with("success","¡La materia se dio de alta correctamente!");
    }


    //Metodo para modificar las materias de tronco comun
    public function updatePlanEstudios(Request $request, $id_pro)
    {
        //Iniciamos la transacción
        DB::beginTransaction();
        try
        {
            $programa=Programa::find($id_pro);
            //Codigo para modificar los archivos de las materias de tronco comun
            if(!Storage::has('public/carreras_planes_estudio/'.$programa->nombre.'/tron_comun')){
                Storage::makeDirectory('public/carreras_planes_estudio/'.$programa->nombre.'/tron_comun');
            }

            //Consultamos los datos del archivo viejo
            $arch_ant=Asignatura_programa::find($request->id_asignatura);
            $nameV=$arch_ant->nom_archivo;
            //Obtenemos la ruta del archivo en cuestión
            $path = storage_path().'/app/public/carreras_planes_estudio/'.$programa->nombre.'/tron_comun';
            if($request->has('nom_archivo')){
                $file =$request->nom_archivo;
                $archExtension = $file->getClientOriginalExtension();
                $archExtension = strtolower($archExtension);
                if($archExtension == 'pdf' || $archExtension == 'doc' || $archExtension == "docx"){
                    $nameN = $request->clave.'-'.$request->nombre.'.'.strtolower($archExtension);
                    $file->move($path,$nameN);
                    //Borramos el archivo viejo para que solo quede el nuevo
                    Storage::delete(['public/carreras_planes_estudio/'.$programa->nombre.'/tron_comun/'.$nameV]);
                }
                else
                {
                    return back()
                    ->with("error","La extension ".$archExtension." no es valida, solo se admite PDF, DOC, DOCX!");
                }
            }
            else{
                //Obtenemos la extencion del archivo viejo
                $ext=substr($nameV,strpos($nameV, ".")+1);
                $nameN=$request->clave."-".$request->nombre.".".$ext;

                //Renombramos el archivo en caso de que solo cambie su nombre
                Storage::move("public/carreras_planes_estudio/".$programa->nombre."/tron_comun/".$nameV, "public/carreras_planes_estudio/".$programa->nombre."/tron_comun/".$nameN);
            }
            //Guardamos el registro en la tabla de asignaturas programa
            Asignatura_programa::where('id',$request->id_asignatura)
            ->update([
                'clave'=>$request->clave,
                'nombre'=>$request->nombre,
                'nom_archivo' => $nameN
            ]);
        }
        // Ha ocurrido un error, devolvemos la BD a su estado previo y hacemos lo que queramos con esa excepción
        catch (\Exception $e)
        {
            DB::rollback();
            return back()
            ->with("error","A ocurrido un error al renombrar el archivo por el siguiente error: CODIGO_002_1218");
        }
        DB::commit();
        // Hacemos los cambios permanentes ya que no han habido errores
        return redirect()->route('carreras.editPlanEstudios',$id_pro)
        ->with("success","¡Materia modificada con exito!");
    }



    /*Metodo para eliminar Materias de tronco común */
    public function destroyPlanEstudios(Request $request, $id_asig)
    {
        //Iniciamos la transacción
        DB::beginTransaction();
        try
        {
            $asignatura = Asignatura_programa::find($id_asig);
            $programa=Programa::find($request->id_programa);

            if($asignatura==NULL){
                return back()
                ->with("error","No se encontro el archivo correspondiente a esta asignatura");
            }
            //Borramos el archivo del directorio
            Storage::delete(['public/carreras_planes_estudio/'.$programa->nombre.'/tron_comun/'.$asignatura->nom_archivo]);
            Asignatura_programa::where('id',$id_asig)->delete();
        }
        // Ha ocurrido un error, devolvemos la BD a su estado previo y hacemos lo que queramos con esa excepción
        catch (\Exception $e)
        {
            DB::rollback();
            return back()
            ->with("error","A ocurrido un error: CODIGO_003_1251");
        }
        // Hacemos los cambios permanentes ya que no han habido errores
        DB::commit();
        return redirect()->route('carreras.editPlanEstudios',$programa->id)
        ->with("warning","¡La materia se elimino correctamente!");
    }



    /*Sección para materias de especialidad */

    //Metodo para gusrdar las materias de la especialidad
    public function storeMatEsp(Request $request, $id_pro)
    {
        //Iniciamos la transacción
        DB::beginTransaction();
        try
        {
            $programa=Programa::find($id_pro);
            //Codigo para cargar los archivos de las carreras
            if(!Storage::has('public/carreras_planes_estudio/'.$programa->nombre.'/especialidad')){
                Storage::makeDirectory('public/carreras_planes_estudio/'.$programa->nombre.'/especialidad');
            }
            if($request->has('nom_archivo')){
                $file =$request->nom_archivo;
                $archExtension = $file->getClientOriginalExtension();
                $archExtension = strtolower($archExtension);
                if($archExtension == 'pdf' || $archExtension == 'doc' || $archExtension == "docx"){
                    $path = storage_path().'/app/public/carreras_planes_estudio/'.$programa->nombre.'/especialidad';
                    $name = $request->clave.'-'.$request->nombre.'.'.strtolower($archExtension);
                    $file->move($path,$name);
                    //Guardamos el registro en la tabla de asignaturas programa
                    $asignatura = new Materia_especialidad;
                    $asignatura->clave = $request->clave;
                    $asignatura->nombre = $request->nombre;
                    $asignatura->nom_archivo=$name;
                    $asignatura->id_especialidad=$request->id_esp;
                    $asignatura->save();
                }else{
                    return back()
                    ->with("error","La extension ".$archExtension." no es valida, solo se admite PDF, DOC, DOCX!");
                }
            }
        }
        // Ha ocurrido un error, devolvemos la BD a su estado previo y hacemos lo que queramos con esa excepción
        catch (\Exception $e)
        {
            DB::rollback();
            return back()
            ->with("error","A ocurrido un error, CODIGO_001_1301");
        }
        // Hacemos los cambios permanentes ya que no han habido errores
        DB::commit();
        //Regresamos a la pagina anterior
        return back()
        ->with("success","¡La materia se dio de alta correctamente!");
    }


    //Metodo para modificar las materias de especialidad
    public function updateMatEspecialidad(Request $request, $id_pro)
    {
        //Iniciamos la transacción
        DB::beginTransaction();
        try
        {
            $programa=Programa::find($id_pro);
            //Codigo para modificar los archivos de las materias de especialidad
            if(!Storage::has('public/carreras_planes_estudio/'.$programa->nombre.'/especialidad')){
                Storage::makeDirectory('public/carreras_planes_estudio/'.$programa->nombre.'/especialidad');
            }
            //Consultamos los datos del archivo viejo
            $arch_ant=Materia_especialidad::find($request->id_asignatura);
            $nameV=$arch_ant->nom_archivo;
            $path = storage_path().'/app/public/carreras_planes_estudio/'.$programa->nombre.'/especialidad';
            if($request->has('nom_archivo'))
            {
                $file =$request->nom_archivo;
                $archExtension = $file->getClientOriginalExtension();
                $archExtension = strtolower($archExtension);
                if($archExtension == 'pdf' || $archExtension == 'doc' || $archExtension == "docx"){
                    $nameN = $request->clave.'-'.$request->nombre.'.'.strtolower($archExtension);
                    $file->move($path,$nameN);
                    //Borramos el archivo viejo para que solo quede el nuevo
                    Storage::delete(['public/carreras_planes_estudio/'.$programa->nombre.'/especialidad/'.$nameV]);
                }
                else
                {
                    return back()
                    ->with("error","La extension ".$archExtension." no es valida, solo se admite PDF, DOC, DOCX!");
                }
            }
            else
            {
                //Obtenemos la extencion del archivo viejo
                $ext=substr($nameV,strpos($nameV, ".")+1);
                $nameN=$request->clave."-".$request->nombre.".".$ext;

                //Renombramos el archivo en caso de que solo cambie su nombre
                Storage::move("public/carreras_planes_estudio/".$programa->nombre."/especialidad/".$nameV, "public/carreras_planes_estudio/".$programa->nombre."/especialidad/".$nameN);
            }
            //Guardamos el registro en la tabla de asignaturas programa
            Materia_especialidad::where('id',$request->id_asignatura)
            ->update([
                'clave'=>$request->clave,
                'nombre'=>$request->nombre,
                'nom_archivo' => $nameN
            ]);


        }
        // Ha ocurrido un error, devolvemos la BD a su estado previo y hacemos lo que queramos con esa excepción
        catch (\Exception $e)
        {
            DB::rollback();
            return back()
            ->with("error","A ocurrido un errol al renombrar el archivo por el siguiente error: CODIGO_002_1369");
        }
        DB::commit();
        // Hacemos los cambios permanentes ya que no han habido errores
        return redirect()->route('carreras.editPlanEstudios',$id_pro)
        ->with("warning","¡Materia modificada con exito!");
    }


    /*Metodo para eliminar Materias de especialidad */
    public function destroyMatEspecialidad(Request $request, $id_asig)
    {
        //Iniciamos la transacción
        DB::beginTransaction();
        try
        {
            $asignatura = Materia_especialidad::find($id_asig);
            $programa=Programa::find($request->id_programa);

            if($asignatura==NULL){
                return back()
                    ->with("error","No se encontro el archivo correspondiente a esta asignatura");
            }
            //Borramos el archivo del directorio
            Storage::delete(['public/carreras_planes_estudio/'.$programa->nombre.'/especialidad/'.$asignatura->nom_archivo]);
            Materia_especialidad::where('id',$id_asig)->delete();
        }
        // Ha ocurrido un error, devolvemos la BD a su estado previo y hacemos lo que queramos con esa excepción
        catch (\Exception $e)
        {
            DB::rollback();
            return back()
            ->with("error","A ocurrido un error CODIGO_003_1401");
        }
        // Hacemos los cambios permanentes ya que no han habido errores
        DB::commit();
        return redirect()->route('carreras.editPlanEstudios',$programa->id)
        ->with("warning","¡La asignatura se elimino con exito!");
    }

}
