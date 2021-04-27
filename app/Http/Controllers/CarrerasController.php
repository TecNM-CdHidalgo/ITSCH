<?php

namespace App\Http\Controllers;

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



class CarrerasController extends Controller
{
    //Mostramos una carrera inicial
    public function index()
    {   
        $idPro=Programa::first('id');        
        $programas=DB::table('programas')->select('id','nombre')->get();
        $pro_act=Programa::find($idPro->id);
        $especialidades=Especialidad::where('id_programa',$idPro->id)->get();
        $objetivos=Objetivo::where('id_programa',$idPro->id)->get();
        $atributos=Atributo::select('atributos.id as idAtr','atributos.numero as numAtr','atributos.descripcion as desAtr','criterios.id as idCri', 'criterios.numero as numCri','criterios.descripcion as desCri') 
        ->leftjoin('criterios', 'atributos.id', '=', 'criterios.id_atributos')            
        ->where('atributos.id_programa',$idPro->id)           
        ->get();               
        return view('admin.contenido.carreras.index')
        ->with('programas',$programas)
        ->with('pro_act',$pro_act)
        ->with('especialidades',$especialidades)
        ->with('objetivos',$objetivos)
        ->with('atributos',$atributos);
    }

    //Mostramos carrera especifica
    public function show($id)
    {
        $programas=DB::table('programas')->select('id','nombre')->get();
        $pro_act=Programa::find($id);       
        $especialidades=Especialidad::where('id_programa',$id)->get();   
        $objetivos=Objetivo::where('id_programa',$id)->get(); 
        $atributos=Atributo::select('atributos.id as idAtr','atributos.numero as numAtr','atributos.descripcion as desAtr','criterios.id as idCri', 'criterios.numero as numCri','criterios.descripcion as desCri') 
        ->leftjoin('criterios', 'atributos.id', '=', 'criterios.id_atributos')            
        ->where('atributos.id_programa',$id)           
        ->get();    
        return view('admin.contenido.carreras.index')
        ->with('programas',$programas)
        ->with('pro_act',$pro_act)
        ->with('especialidades',$especialidades)
        ->with('objetivos',$objetivos)
        ->with('atributos',$atributos);    
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
    public function updatecarreracom(Request $request, $id)
    {               
        $carrera = Programa::find($id);
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

        return back()->withInput();
    } 
    

    //Sección de Especialidades

    /*Edicion de especialidades*/
    public function editEspecialidad($id)
    {
        $programa=Programa::find($id);
        $especialidades=Especialidad::where('id_programa', $id)->get();               
        return view('admin.contenido.carreras.editespecialidades')
        ->with('especialidades',$especialidades)
        ->with('programa',$programa);
    }

    /*Metodo para agregar los programas educativos de la institución */
    public function storeEspecialidad(Request $request)
    {
        $especialidad = new Especialidad();
        $especialidad->nombre = $request->nombre;
        $especialidad->clave = $request->clave;
        $especialidad->objetivo = $request->objetivo;
        $especialidad->id_programa = $request->id_programa;
        $especialidad->save();
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

   /*Metodo para modificar objetivos */
   public function updateAtributos(Request $request,$id)
   {
       $atributo = Atributo::find($id);
       $atributo->numero = $request->numAtr;
       $atributo->descripcion = $request->desAtr;      
       $atributo->id_programa = $request->id_programa;
       $atributo->save();
       return redirect()->route('carreras.editAtributos',$request->id_programa);
   }

   /*Metodo para eliminar objetivos */
   public function destroyAtributos(Request $request, $id)
   {          
       $atributo = Atributo::where('id',$id)->where('id_programa',$request->id_programa);       
       $atributo->delete();
       return redirect()->route('carreras.editAtributos',$request->id_programa);
   }


   //Sección de Criterios

   /*Metodo para agregar los programas educativos de la institución */
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

   /*Edicion de especialidades*/
   public function editEstructura($id_pro)
   {
       $programa=Programa::find($id_pro);
       $personal=Personal::all(); 
       $formacion=Formacion::all(); 
       $productos=Producto::all();      
     
       return view('admin.contenido.carreras.editestructura')
       ->with('personal',$personal)
       ->with('programa',$programa)
       ->with('formacion',$formacion)
       ->with('productos',$productos);
       
   }

   /*Metodo para agregar profesores*/
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

    /*Metodo para modificar criterios */
    public function updateDetalles(Request $request,$id)
    {
        $criterio = Criterio::find($id);
        $criterio->numero = $request->numCri;
        $criterio->descripcion = $request->desCri;      
        $criterio->save();
        return redirect()->route('carreras.editAtributos',$request->id_programa);
    }
 
    /*Metodo para eliminar criterios */
    public function destroyDetalles(Request $request, $id)
    {          
        $criterio = Criterio::find($id);       
        $criterio->delete();
        return redirect()->route('carreras.editAtributos',$request->id_programa);
    }
  

}
