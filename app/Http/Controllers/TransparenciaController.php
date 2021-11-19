<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Transparencia;
use App\Models\Periodo;
use Illuminate\Http\Request;

class TransparenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docs=Transparencia::all();
        return view('admin.contenido.transparencia.index')
        ->with('docs',$docs);
    }

    //Funcion para consultar periodos
    public function periodos()
    {
        $per=Periodo::all();
        return view('admin.contenido.transparencia.periodos')
        ->with('per',$per);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $periodo=new Periodo();
        $periodo->nombre=$request->periodo;
        $periodo->save();

        return Redirect()->route('transparencia.periodos')
        ->with('success','¡El periodo se creo correctamente!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\transparencia  $transparencia
     * @return \Illuminate\Http\Response
     */
    public function show(transparencia $transparencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transparencia  $transparencia
     * @return \Illuminate\Http\Response
     */
    public function edit(transparencia $transparencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transparencia  $transparencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transparencia $transparencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transparencia  $transparencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(transparencia $transparencia)
    {
        //
    }

    //Función para modificar el periodo
    public function perUpdate(Request $request)
    {
        $periodo=Periodo::find($request->id);
        $periodo->nombre=$request->nombre;
        $periodo->save();

        return Redirect()->back()->with('success','¡El periodo se modifico correctamente!');
    }
}
