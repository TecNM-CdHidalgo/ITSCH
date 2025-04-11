<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Transparencia;
use App\Models\Periodo;
use Illuminate\Http\Request;

class TransparenciaController extends Controller
{
    //Función que consulta el primer periodo para mostrar en la vista publica
    public function index()
    {
        // Verificamos que el usuario tenga al menos uno de los permisos
        // if (!auth()->user()->hasAnyPermission(['VIP', 'ver_transparencia'])) {
        //     return redirect()->route('home')
        //     ->with('msg', 'error')
        //     ->with('msj', 'No tienes permiso para ver esta sección');
        // }
        $periodos=Periodo::all();
        $u_reg=Periodo::all()->last();
        $per_sel=Periodo::select('nombre','id')->first()->get();
        $arch=Transparencia::where('id_periodo',$per_sel[0]->id)->get();
        return view('content.transparencia.acceso_transparencia')
        ->with('arch',$arch)
        ->with('periodos',$periodos)
        ->with('u_reg',$u_reg)
        ->with('per_sel',$per_sel);
    }

    //Función para consultar periodos especificos
    public function perConsultar(Request $request)
    {
        // Verificamos que el usuario tenga al menos uno de los permisos
        if (!auth()->user()->hasAnyPermission(['VIP', 'ver_transparencia'])) {
            return redirect()->route('home')
            ->with('msg', 'error')
            ->with('msj', 'No tienes permiso para ver esta sección');
        }
        $periodos=Periodo::all();
        $arch=Transparencia::where('id_periodo',$request->periodo)->get();
        $u_reg=Periodo::all()->last();
        $per_sel=Periodo::select('nombre')->where('id',$request->periodo)->get();
        return view('content.transparencia.acceso_transparencia')
        ->with('arch',$arch)
        ->with('periodos',$periodos)
        ->with('u_reg',$u_reg)
        ->with('per_sel',$per_sel);
    }


    //Funcion para consultar periodos
    public function periodos()
    {
        // Verificamos que el usuario tenga al menos uno de los permisos
        if (!auth()->user()->hasAnyPermission(['VIP', 'ver_transparencia'])) {
            return redirect()->route('home')
            ->with('msg', 'error')
            ->with('msj', 'No tienes permiso para ver esta sección');
        }
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
        // Verificamos que el usuario tenga al menos uno de los permisos
        if (!auth()->user()->hasAnyPermission(['VIP', 'crear_transparencia'])) {
            return redirect()->route('home')
            ->with('msg', 'error')
            ->with('msj', 'No tienes permiso para ver esta sección');
        }

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
        // Verificamos que el usuario tenga al menos uno de los permisos
        if (!auth()->user()->hasAnyPermission(['VIP', 'crear_transparencia'])) {
            return redirect()->route('home')
            ->with('msg', 'error')
            ->with('msj', 'No tienes permiso para ver esta sección');
        }

        $periodo=Periodo::find($id_per);
        $arch=Transparencia::where('id_periodo',$id_per)->get();
        return view('admin.contenido.transparencia.crear')
        ->with('periodo',$periodo)
        ->with('arch',$arch);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Verificamos que el usuario tenga al menos uno de los permisos
        if (!auth()->user()->hasAnyPermission(['VIP', 'crear_transparencia'])) {
            return redirect()->route('home')
            ->with('msg', 'error')
            ->with('msj', 'No tienes permiso para ver esta sección');
        }

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
                    $transparencia->nombre = strtoupper($nombre);
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transparencia  $transparencia
     * @return \Illuminate\Http\Response
     */
    public function archDestroy($id_arch)
    {
        // Verificamos que el usuario tenga al menos uno de los permisos
        if (!auth()->user()->hasAnyPermission(['VIP', 'eliminar_transparencia'])) {
            return redirect()->route('home')
            ->with('msg', 'error')
            ->with('msj', 'No tienes permiso para ver esta sección');
        }

        //Iniciamos la transacción
        DB::beginTransaction();
        try
        {
            $arch = Transparencia::find($id_arch);
            $periodo=Periodo::find($arch->id_periodo);
            if($arch==NULL){
                return Redirect()->back()
                ->with('error','¡No se encontro el archivo!');
            }
            //Borramos el archivo de la reticula
            Storage::delete(['public/transparencia/'.$periodo->nombre.'/'.$arch->nom_arch]);
            Transparencia::where('id',$id_arch)->delete();
        }
        // Ha ocurrido un error, devolvemos la BD a su estado previo y hacemos lo que queramos con esa excepción
        catch (\Exception $e)
        {
            DB::rollback();
            return Redirect()->back()->with('error','¡A ocurrido un error!');
        }
        // Hacemos los cambios permanentes ya que no han habido errores
        DB::commit();
        return Redirect()->back()->with('success','¡El archivo se elimino correctamente!');
    }

    //Función para modificar el periodo
    public function perUpdate(Request $request)
    {
        // Verificamos que el usuario tenga al menos uno de los permisos
        if (!auth()->user()->hasAnyPermission(['VIP', 'editar_transparencia'])) {
            return redirect()->route('home')
            ->with('msg', 'error')
            ->with('msj', 'No tienes permiso para ver esta sección');
        }

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
        // Verificamos que el usuario tenga al menos uno de los permisos
        if (!auth()->user()->hasAnyPermission(['VIP', 'eliminar_transparencia'])) {
            return redirect()->route('home')
            ->with('msg', 'error')
            ->with('msj', 'No tienes permiso para ver esta sección');
        }

        DB::beginTransaction();

        try
        {
            $periodo = Periodo::find($request->id);
            //Eliminamos la carpeta con todos los archivos del periodo
            Storage::deleteDirectory('public/transparencia/'.$periodo->nombre);
            $periodo->delete();

            DB::commit();
            return Redirect()->route('periodos.inicio')->with('success','¡El periodo se elimino correctamente!');
        }
        catch (\Exception $e)
        {
            DB::rollback();
            return Redirect()->back()->with('error','¡El periodo no se pudo eliminar, ocurrio un error!');
        }
    }
}
