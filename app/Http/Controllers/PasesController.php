<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Departamento;
use App\Models\PasesSalida;
use Illuminate\Support\Facades\DB;
use App\Mail\PaseAutorizacion;
use Illuminate\Support\Facades\Mail;
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
                ->orderBy('pases_salidas.fecha_solicitud', 'desc')
                ->get();         
        }
        // Si es el jefe solo ve los pases de salida de su área
        else if(auth()->user()->hasAnyPermission(['ver_pases', 'eliminar_pases', 'editar_pases'])){
            $pases = PasesSalida::join('users', 'pases_salidas.user_id', '=', 'users.id')
                ->join('users as jefes', 'pases_salidas.jefe_id', '=', 'jefes.id')
                ->join('areas', 'pases_salidas.area_id', '=', 'areas.id')
                ->select('pases_salidas.*', 'users.name as usuario', 'jefes.name as jefe', 'areas.nombre as area')
                ->where('pases_salidas.jefe_id', auth()->user()->id)
                ->orderBy('pases_salidas.fecha_solicitud', 'desc')
                ->get(); 
           
        }
        //Si es un trabajador normal, solo ve sus priopios pases de salida
        if(auth()->user()->hasPermissionTo('solicitar_pases')){
            $pases = PasesSalida::join('users', 'pases_salidas.user_id', '=', 'users.id')
                ->join('users as jefes', 'pases_salidas.jefe_id', '=', 'jefes.id')
                ->join('areas', 'pases_salidas.area_id', '=', 'areas.id')
                ->select('pases_salidas.*', 'users.name as usuario', 'jefes.name as jefe', 'areas.nombre as area')
                ->where('pases_salidas.user_id', auth()->user()->id)
                ->orderBy('pases_salidas.fecha_solicitud', 'desc')
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
        $pase = PasesSalida::create($request->all());

        // Obtenemos el trabajador que está realizando la solicitud
        $trabajador = User::find(auth()->user()->id); // Obtener al trabajador que está haciendo la solicitud

        // Obtenemos el jefe
        $jefe = User::find($request->jefe_id);

        // Verificamos si el jefe existe
        if ($jefe) {
            // Enviar correo al jefe con el nombre del trabajador que está solicitando el pase
            Mail::to($jefe->email)->send(new PaseAutorizacion($pase, $trabajador, $jefe));
        }       
    
        return redirect()->route('pases.index')
            ->with('msg','success')
            ->with('msj', 'Pase de salida creado correctamente y correo enviado al jefe para autorización.');
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

    public function show()
    {
       //Consultamos todos los pases de salida de ultimo mes
        $pases = PasesSalida::join('users', 'pases_salidas.user_id', '=', 'users.id')
            ->join('users as jefes', 'pases_salidas.jefe_id', '=', 'jefes.id')
            ->join('areas', 'pases_salidas.area_id', '=', 'areas.id')
            ->select('pases_salidas.*', 'users.name as usuario', 'jefes.name as jefe', 'areas.nombre as area')
            ->where('pases_salidas.fecha_solicitud', '>=', now()->subMonth())
            ->orderBy('pases_salidas.fecha_solicitud', 'desc')
            ->get(); 
        // Obtenemos la lista de trabajadores del modelo usuario
        $trabajadores = User::all(); 
        // Obtenemos la lista de áreas del modelo area
        $areas = Area::all();
      
        return view('admin.institucion.pases.show', compact('pases', 'trabajadores', 'areas'));
    }

    public function consultarPases(Request $request)
    {
        // Inicializar la variable para evitar el error de "variable no definida"
        $pases = collect(); 
    
        // Construimos la consulta base
        $query = PasesSalida::join('users', 'pases_salidas.user_id', '=', 'users.id')
            ->join('users as jefes', 'pases_salidas.jefe_id', '=', 'jefes.id')
            ->join('areas', 'pases_salidas.area_id', '=', 'areas.id')
            ->select('pases_salidas.*', 'users.name as usuario', 'jefes.name as jefe', 'areas.nombre as area');
    
        // Si se filtra por trabajador
        if ($request->trabajador_id != null && $request->area_id == null) {
            $query->where('pases_salidas.user_id', $request->trabajador_id);
        }
        // Si se filtra por área
        else if ($request->trabajador_id == null && $request->area_id != null) {
            $query->where('pases_salidas.area_id', $request->area_id);
        }
        // Si se filtra por trabajador y área 
        else if ($request->trabajador_id != null && $request->area_id != null) {
            $query->where('pases_salidas.user_id', $request->trabajador_id)
                  ->where('pases_salidas.area_id', $request->area_id);
        }
    
        // Filtrar por rango de fechas si están definidos
        if ($request->fecha_inicio && $request->fecha_fin) {
            $query->whereBetween('pases_salidas.fecha_solicitud', [$request->fecha_inicio, $request->fecha_fin]);
        }
    
        // Ejecutar la consulta
        $pases = $query->orderBy('pases_salidas.fecha_solicitud', 'desc')->get();
    
        // Retornar el resultado en formato JSON
        return response()->json($pases);
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

    public function autorizar($pase_id, $autorizar)
    {
        // Busca el pase de salida por ID
        $pase = PasesSalida::find($pase_id); 

        // Autorizar o denegar el pase según el valor de $autorizar
        if ($autorizar === 'true') {
            $pase->estado = 'aprobado'; // Puedes usar el estado que necesites
        } else {
            $pase->estado = 'denegado';
        }

        // Guarda los cambios
        $pase->save();

        // Retorna una respuesta o redirige a una página
        return redirect()->route('inicio')->with('msg', 'El pase ha sido ' . ($autorizar === 'true' ? 'autorizado' : 'denegado') . ' correctamente.');
    }




}
