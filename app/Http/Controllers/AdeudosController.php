<?php

namespace App\Http\Controllers;
use App\Models\Adeudos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Area;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

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
       //Consultamos el adeudo y los datos del alumno
        $adeudo = Adeudos::find($request->id);
        $alumno = DB::connection('contEsc')->table('alumnos')
            ->where('alu_NumControl', $adeudo->control)
            ->select('alu_NumControl', 'alu_Nombre', 'alu_ApePaterno', 'alu_ApeMaterno', 'car_Clave', 'alu_StatusAct')
            ->first();
        return view('admin.institucion.adeudos.edit', compact('adeudo', 'alumno'));
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
        // Consultamos todos los adeudos pagados, datos del alumno y carrera
        $adeudos = Adeudos::where('status', 'pagado')->get();
        $controles = $adeudos->pluck('control')->toArray();
        $alumnos = DB::connection('contEsc')->table('alumnos')
            ->whereIn('alu_NumControl', $controles)
            ->select('alu_NumControl', 'alu_Nombre', 'alu_ApePaterno', 'alu_ApeMaterno', 'car_Clave', 'alu_StatusAct')
            ->get()
            ->keyBy('alu_NumControl');
            $clavesCarrera = $alumnos->pluck('car_Clave')->unique()->filter()->toArray();
            $carreras = DB::connection('contEsc')->table('carreras')
            ->whereIn('car_Clave', $clavesCarrera)
            ->pluck('car_Nombre', 'car_Clave');
            foreach ($adeudos as $adeudo) {
                $adeudo->alumno = $alumnos[$adeudo->control] ?? null;
                if (!$adeudo->alumno) {
                    $adeudo->carrera = 'Sin carrera';
                    continue;
                }
                $adeudo->carrera = $carreras[$adeudo->alumno->car_Clave] ?? 'Sin carrera';
            }
            return view('admin.institucion.adeudos.indexEliminar', compact('adeudos'));
    }



    public function destroyAll(Request $request)
    {
        //Eliminamos los registros que fueron pagados
        Adeudos::where('status', 'pagado')->delete();
        return redirect()->route('adeudos.index') ->with('success','¡Los adeudos pagados se eliminaron correctamente!');
    }

    public function buscarAdeudo(Request $request)
    {
        // Consultamos el adeudo y datos del alumno
        $adeudo = Adeudos::where('control', $request->control)->where('status', 'Pendiente')->first();

        // Si no hay adeudo pendiente, solo devolvemos el nombre del alumno
        if (!$adeudo) {
            $alumno = DB::connection('contEsc')->table('alumnos')
                ->where('alu_NumControl', $request->control)
                ->select('alu_Nombre', 'alu_ApePaterno', 'alu_ApeMaterno')
                ->first();

            return response()->json([
                'alumno' => $alumno
            ]);
        }

        // Si hay adeudo, consultamos los datos del adeudo y el área
        $alumno = DB::connection('contEsc')->table('alumnos')
            ->where('alu_NumControl', $request->control)
            ->select('alu_NumControl', 'alu_Nombre', 'alu_ApePaterno', 'alu_ApeMaterno', 'car_Clave', 'alu_StatusAct')
            ->first();
        $area = Area::find($adeudo->area_id);

        // Retornamos un JSON con los datos del adeudo, el alumno y el área
        return response()->json([
            'adeudo' => $adeudo,
            'alumno' => $alumno,
            'area' => $area
        ]);

    }



    public function imprimirConstancia(Request $request)
    {
        // Consulta del alumno
        $alumno = DB::connection('contEsc')->table('alumnos')
            ->where('alu_NumControl', $request->controlR)
            ->select('alu_NumControl', 'alu_Nombre', 'alu_ApePaterno', 'alu_ApeMaterno', 'car_Clave', 'alu_StatusAct')
            ->first();
        //Agregamos el nombre de la carrera a la consulta
        $carrera = DB::connection('contEsc')->table('carreras')
            ->where('car_Clave', $alumno->car_Clave)
            ->select('car_Nombre')
            ->first();

        //Agregamos la fecha actual sin la hora
        $fecha = Carbon::now() ->format('d-m-Y');

        // Verificar si el alumno existe
        if (!$alumno) {
            abort(404, 'Alumno no encontrado');
        }

        $tipo = $request->input('tipo'); // Recibe el valor del radio seleccionado

        switch ($tipo) {
            case 'baja':
                // Generar PDF de constancia de baja
                $pdf = PDF::loadView('content.servicios_escolares.adeudosBajaPDF', compact('alumno','carrera','fecha'));
                break;
            case 'egreso':
                // Generar PDF de constancia de egreso
                $pdf = PDF::loadView('content.servicios_escolares.adeudosEgresoPDF', compact('alumno','carrera','fecha'));
                break;
            case 'titulacion':
                // Generar PDF de constancia de egreso
                $pdf = PDF::loadView('content.servicios_escolares.adeudosTitulacionPDF', compact('alumno','carrera','fecha'));
                break;
            default:
                return "Opción no válida";
        }
        // Retornar el PDF como una vista previa en el navegador
        return $pdf->stream('constancia_no_adeudos.pdf');

    }

}
