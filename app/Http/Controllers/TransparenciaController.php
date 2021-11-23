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
    public function perCreate(Request $request)
    {
        DB::beginTransaction();

        try
        {
            $periodo=new Periodo();
            $periodo->nombre=strtoupper($request->nombre);
            $periodo->save();

            DB::commit();
            return Redirect()->route('periodos.inicio')
            ->with('success','¡El periodo se creo correctamente!');
        }
        catch (\Exception $e)
        {
            DB::rollback();
            return Redirect()->back()->with('error','¡El periodo no se pudo registrar!');
        }
    }

    //Funcion para llamar a la vista que permite agregar archivos a un periodo
    public function archPerAgregar($id_per)
    {
        $periodo=Periodo::find($id_per);
        return view('admin.contenido.transparencia.crear')
        ->with('periodo',$periodo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $periodo=Periodo::find($request->id);
        //Iniciamos la transacción
        DB::beginTransaction();
        try
        {
            //Codigo para cargar los archivos de las carreras
            if(!Storage::has('public/transparencia/'.$periodo->nombre)){
            Storage::makeDirectory('public/transparencia/'.$periodo->nombre);
            }
            if($request->has('arch'))
            {
                $file =$request->arch;
                $archExtension = $file->getClientOriginalExtension();
                $archExtension = strtolower($archExtension);
                if($archExtension == 'pdf' || $archExtension == 'doc' || $archExtension == "docx" || $archExtension == 'csv' || $archExtension == "xls" || $archExtension == "xlsx" ){
                    $path = storage_path().'/app/public/transparencia/'.$periodo->nombre;
                    $name = 'arch'.time().'.'.strtolower($archExtension);
                    $file->move($path,$name);
                    //Guardamos el nombre del archivo en la tabla de transparencia
                    $nom_orig=$file->getClientOriginalName();
                    $transparencia = new Transparencia;
                    $transparencia->nom_arch = $name;
                    $transparencia->id_periodo = $request->id;
                    $nombre=substr($nom_orig,0,(strlen($nom_orig))-(strlen($archExtension)+1));
                    $transparencia->nombre = $nombre;
                    $transparencia->save();
                }else{
                    return Redirect()->back()->with('error','¡La extencion del archivo no es valida!');
                }
            }
        }
        // Ha ocurrido un error, devolvemos la BD a su estado previo y hacemos lo que queramos con esa excepción
        catch (\Exception $e)
        {
            dd($e);
            DB::rollback();
            return Redirect()->back()->with('error','¡A ocurrido un error!');
        }
        // Hacemos los cambios permanentes ya que no han habido errores
        DB::commit();
        return Redirect()->back()
        ->with('success','¡El archivo se dio de alta correctamente!');
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
        DB::beginTransaction();

        try
        {
            $periodo=Periodo::find($request->id);
            $periodo->nombre=strtoupper($request->nombre);
            $periodo->save();

            DB::commit();
            return Redirect()->route('periodos.inicio')
            ->with('success','¡El periodo se modifico correctamente!');
        }
        catch (\Exception $e)
        {
            DB::rollback();
            return Redirect()->back()->with('error','¡El periodo no se pudo modificar!');
        }
    }

    //Función para eliminar el periodo
    public function perDestroy(Request $request)
    {
        $periodo = Periodo::find($request->id);
        $periodo->delete();

        return Redirect()->route('periodos.inicio')
        ->with('success','¡El periodo se elimino correctamente!');
    }
}
