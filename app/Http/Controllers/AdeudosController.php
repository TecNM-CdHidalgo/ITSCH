<?php

namespace App\Http\Controllers;
use App\Models\Adeudos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Area;
use Carbon\Carbon;

class AdeudosController extends Controller
{
    public function index()
    {
        // Consultamos los adeudos cuyo estatus sea solo igual a pendiente
        $adeudos = Adeudos::where('status', 'Pendiente')->get();

        // Obtener los números de control de los alumnos en una sola consulta
        $controles = $adeudos->pluck('control')->toArray();

        // Cargar todos los alumnos en una sola consulta
        $alumnos = DB::connection('contEsc')->table('alumnos')
            ->whereIn('alu_NumControl', $controles)
            ->select('alu_NumControl', 'alu_Nombre', 'alu_ApePaterno', 'alu_ApeMaterno', 'car_Clave', 'alu_StatusAct')
            ->get()
            ->keyBy('alu_NumControl'); // Indexar por número de control para acceso rápido

        // Obtener las claves de carrera únicas de los alumnos encontrados
        $clavesCarrera = $alumnos->pluck('car_Clave')->unique()->filter()->toArray();

        // Cargar todas las carreras en una sola consulta
        $carreras = DB::connection('contEsc')->table('carreras')
            ->whereIn('car_Clave', $clavesCarrera)
            ->pluck('car_Nombre', 'car_Clave'); // Obtiene un array clave => nombre

        // Asignamos los datos a cada adeudo
        foreach ($adeudos as $adeudo) {
            $adeudo->alumno = $alumnos[$adeudo->control] ?? null;

            // Si no se encuentra el alumno, asignar "Sin carrera" y continuar
            if (!$adeudo->alumno) {
                $adeudo->carrera = 'Sin carrera';
                continue;
            }

            // Asignar la carrera basada en la clave, o "Sin carrera" si no existe
            $adeudo->carrera = $carreras[$adeudo->alumno->car_Clave] ?? 'Sin carrera';
        }

        return view('admin.institucion.adeudos.index', compact('adeudos'));       
    }

    public function create()
    {
        //Consultamos las áreas
        $areas = Area::all();
        return view('admin.institucion.adeudos.create', compact('areas'));        
    }

    public function store(Request $request)
    {
        $adeudo = new Adeudos();
        $adeudo->control = $request->control;
        $adeudo->area_id = $request->area_id;       
        $adeudo->concepto = $request->concepto;
        $adeudo->fecha_adeudo = $request->fecha_adeudo;      
        $adeudo->save();
        return redirect()->route('adeudos.index') ->with('success','¡El adeudo se dio de alta correctamente!');
    }

    public function edit(Request $request)
    {
        $adeudo = Adeudos::find($request->id);
        $areas = Area::all();
        return view('admin.institucion.adeudos.edit', compact('adeudo', 'areas'));
    }

    public function update(Request $request)
    {
        $adeudo = Adeudos::find($request->id);
        $adeudo->control = $request->control;
        $adeudo->status = $request->status;
        $adeudo->fecha_pago = Carbon::now();     
        $adeudo->save();
        return redirect()->route('adeudos.index') ->with('success','¡El adeudo se actualizó correctamente!');
    }

    public function destroy(Request $request)
    {
        $adeudo = Adeudos::find($request->id);
        $adeudo->delete();
        return redirect()->route('adeudos.index') ->with('success','¡El adeudo se eliminó correctamente!');
    }

    public function indexEliminar()
    {
        // Consultamos todos los adeudos
        $adeudos = Adeudos::all();
        return view('admin.institucion.adeudos.indexEliminar', compact('adeudos'));
    }
}
