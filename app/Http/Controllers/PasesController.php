<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Departamento;
use App\Models\PasesSalida;
use Illuminate\Support\Facades\DB;
use App\User;

class PasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Seleccionamos los pases de salida que tiene derecho a ver el usuario de acuerdo a los permisos
        // Si tiene el permiso VIP vera todos los pases de salida
        if(auth()->user()->hasPermissionTo('VIP')){
            $pases = PasesSalida::join('users', 'pases_salidas.user_id', '=', 'users.id')
                ->join('users as jefes', 'pases_salidas.jefe_id', '=', 'jefes.id')
                ->join('areas', 'pases_salidas.area_id', '=', 'areas.id')
                ->select('pases_salidas.*', 'users.name as usuario', 'jefes.name as jefe', 'areas.nombre as area')
                ->get();         
        }
        // Si no tiene el permiso VIP, solo vera los pases de salida donde el es el jefe
        else if(auth()->user()->hasAnyPermission(['ver_pases', 'eliminar_pases', 'editar_pases'])){
            $pases = PasesSalida::join('users', 'pases_salidas.user_id', '=', 'users.id')
                ->join('users as jefes', 'pases_salidas.jefe_id', '=', 'jefes.id')
                ->join('areas', 'pases_salidas.area_id', '=', 'areas.id')
                ->select('pases_salidas.*', 'users.name as usuario', 'jefes.name as jefe', 'areas.nombre as area')
                ->where('pases_salidas.jefe_id', auth()->user()->id)
                ->get(); 
           
        }
        //Si tiene el permiso de solicitar pases de salida solo vera los propios
        if(auth()->user()->hasPermissionTo('solicitar_pases')){
            $pases = PasesSalida::join('users', 'pases_salidas.user_id', '=', 'users.id')
                ->join('users as jefes', 'pases_salidas.jefe_id', '=', 'jefes.id')
                ->join('areas', 'pases_salidas.area_id', '=', 'areas.id')
                ->select('pases_salidas.*', 'users.name as usuario', 'jefes.name as jefe', 'areas.nombre as area')
                ->where('pases_salidas.user_id', auth()->user()->id)
                ->get();          
        }       
        return view('admin.institucion.pases.index', compact('pases'));
    }

    /**
     * llamma a la vista para crear un nuevo pase
     */
    public function create()
    {
        $areas = Area::all();   
        $jefes = User::where('tipo', 'jefe')->get();   
        return view('admin.institucion.pases.create', compact('areas', 'jefes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Guardamos el id del usuario que solicita el pase
        $request->merge(['user_id' => auth()->user()->id]);       
        // Creamos el pase de salida        
        PasesSalida::create($request->all());

        return redirect()->route('pases.index')
            ->with('msg','success')
            ->with('msj', 'Pase de salida creado correctamente.');
    }

    public function edit($id)
    {
        $pase = PasesSalida::join('users', 'pases_salidas.user_id', '=', 'users.id')
        ->join('users as jefes', 'pases_salidas.jefe_id', '=', 'jefes.id')
        ->join('areas', 'pases_salidas.area_id', '=', 'areas.id')
        ->select('pases_salidas.*', 'users.name as usuario', 'jefes.name as jefe', 'areas.nombre as area')
        ->where('pases_salidas.id', $id)
        ->first(); 
        $areas = Area::all();   
        $jefes = User::where('tipo', 'jefe')->get();   
        return view('admin.institucion.pases.edit', compact('pase', 'areas', 'jefes'));
    }

    public function update(Request $request, $id)
    {
        $pase = PasesSalida::find($id); 
        $pase->update($request->all());
        return redirect()->route('pases.index')
            ->with('msg','success')
            ->with('msj', 'Pase de salida actualizado correctamente.');
    }

    public function destroy($id)
    {
        $pase = PasesSalida::find($id);
        $pase->delete();
        return redirect()->route('pases.index')
            ->with('msg','success')
            ->with('msj', 'Pase de salida eliminado correctamente.');
    }

    public function verificar($id)
    {
        $pase = PasesSalida::join('users', 'pases_salidas.user_id', '=', 'users.id')
        ->join('users as jefes', 'pases_salidas.jefe_id', '=', 'jefes.id')
        ->join('areas', 'pases_salidas.area_id', '=', 'areas.id')
        ->select('pases_salidas.*', 'users.name as usuario', 'jefes.name as jefe', 'areas.nombre as area')
        ->where('pases_salidas.id', $id)
        ->first(); 
        return view('admin.institucion.pases.verificar', compact('pase'));
    }

    public function estadisticos()
    {
        $pases = PasesSalida::join('users', 'pases_salidas.user_id', '=', 'users.id')
            ->join('users as jefes', 'pases_salidas.jefe_id', '=', 'jefes.id')
            ->join('areas', 'pases_salidas.area_id', '=', 'areas.id')
            ->select('pases_salidas.*', 'users.name as usuario', 'jefes.name as jefe', 'areas.nombre as area')
            ->get();
        $areas = Area::all();
        return view('admin.institucion.pases.estadisticos', compact('pases', 'areas'));
    }

    public function estadisticosGenerar(Request $request)
    {
        if ($request->area_id == 0) {
            // Si es 0, agrupa por área
            $pases = PasesSalida::join('areas', 'pases_salidas.area_id', '=', 'areas.id')
                ->select('areas.nombre as nombre', DB::raw('COUNT(pases_salidas.id) as cantidad_pases'))
                ->whereBetween('pases_salidas.fecha_solicitud', [$request->fecha_inicio, $request->fecha_fin])
                ->groupBy('areas.id', 'areas.nombre')
                ->orderBy('cantidad_pases', 'desc')
                ->limit(5)
                ->get();
        } else {
            // Si es un área específica, agrupa por usuarios
            $pases = PasesSalida::join('users', 'pases_salidas.user_id', '=', 'users.id')
                ->join('areas', 'pases_salidas.area_id', '=', 'areas.id')
                ->select('users.name as nombre', DB::raw('COUNT(pases_salidas.id) as cantidad_pases'))
                ->where('pases_salidas.area_id', $request->area_id)
                ->whereBetween('pases_salidas.fecha_solicitud', [$request->fecha_inicio, $request->fecha_fin])
                ->groupBy('users.id', 'users.name')
                ->orderBy('cantidad_pases', 'desc')
                ->limit(5)
                ->get();
        }

        return response()->json($pases);
    }



}
