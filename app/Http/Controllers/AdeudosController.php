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
        // Verificamos que el usuario tenga al menos uno de los permisos
        if (!auth()->user()->hasAnyPermission(['VIP', 'ver_adeudos'])) {
            return redirect()->route('home')
            ->with('msg', 'error')
            ->with('msj', 'No tienes permiso para ver esta sección');
        }

        // Consultar adeudos pendientes
        $adeudos = Adeudos::where('status', 'Pendiente')->get();

        //cambiamos los numeros de control a mayusculas
        $adeudos = $adeudos->map(function ($adeudo) {
            $adeudo->control = strtoupper($adeudo->control);
            return $adeudo;
        });

        // Obtener los números de control de los alumnos
        $controles = $adeudos->pluck('control')->toArray();

        if (empty($controles)) {
            return view('admin.institucion.adeudos.index')->with('msg', 'error')->with('msj','¡No se encontraron adeudos pendientes!');
        }

        // Cargar todos los alumnos en una sola consulta
        $alumnos = DB::connection(env('DB_CONNECTION_SECOND'))
        ->table('Alumnos')
        ->whereIn('alu_NumControl', $controles)
        ->select('alu_NumControl', 'alu_Nombre', 'alu_ApePaterno', 'alu_ApeMaterno', 'car_Clave', 'alu_StatusAct')
        ->get()
        ->mapWithKeys(fn($alumno) => [strtoupper(trim($alumno->alu_NumControl)) => $alumno]); // Eliminar espacios extra


        // Obtener las claves de carrera únicas de los alumnos encontrados
        $clavesCarrera = $alumnos->pluck('car_Clave')->filter()->unique()->toArray();

        // Cargar todas las carreras en una sola consulta
        $carreras = DB::connection(env('DB_CONNECTION_SECOND'))
            ->table('Carreras')
            ->whereIn('car_Clave', $clavesCarrera)
            ->pluck('car_Nombre', 'car_Clave'); // Obtiene un array clave => nombre

        // Asignar los datos a cada adeudo
        foreach ($adeudos as $adeudo) {
            $control = strtoupper(trim($adeudo->control, " \t\n\r\0\x0B\xC2\xA0")); // Eliminar espacios y caracteres invisibles
            $adeudo->alumno = $alumnos[$control] ?? null;
            $adeudo->alumno = $alumnos[$adeudo->control] ?? null;
            $adeudo->carrera = $adeudo->alumno ? ($carreras[$adeudo->alumno->car_Clave] ?? 'Sin carrera') : 'Sin carrera';
        }

        return view('admin.institucion.adeudos.index', compact('adeudos'));
    }


    public function create()
    {
         // Verificamos que el usuario tenga al menos uno de los permisos
         if (!auth()->user()->hasAnyPermission(['VIP', 'crear_adeudos'])) {
            return redirect()->route('home')
            ->with('msg', 'error')
            ->with('msj', 'No tienes permiso para ver esta sección');
        }
        //Consultamos las áreas
        $areas = Area::all();
        return view('admin.institucion.adeudos.create', compact('areas'));
    }

    public function store(Request $request)
    {
         // Verificamos que el usuario tenga al menos uno de los permisos
         if (!auth()->user()->hasAnyPermission(['VIP', 'crear_adeudos'])) {
            return redirect()->route('home')
            ->with('msg', 'error')
            ->with('msj', 'No tienes permiso para ver esta sección');
        }
        //Verificamos que el numero de control exista en servicios escolares
        $alumno = DB::connection(env('DB_CONNECTION_SECOND'))->table('Alumnos')
            ->where('alu_NumControl', $request->control)
            ->select('alu_NumControl')
            ->first();
        if (!$alumno) {
            return redirect()->route('adeudos.create') ->with('msg','error')->with('msj','¡El número de control no existe en la base de datos de servicios escolares!');
        }
        $adeudo = new Adeudos();
        $adeudo->control = strtoupper($request->control);
        $adeudo->area_id = $request->area_id;
        $adeudo->concepto = $request->concepto;
        $adeudo->fecha_adeudo = $request->fecha_adeudo;
        $adeudo->save();
        return redirect()->route('adeudos.index') ->with('success','¡El adeudo se dio de alta correctamente!');
    }

    public function edit(Request $request)
    {
         // Verificamos que el usuario tenga al menos uno de los permisos
         if (!auth()->user()->hasAnyPermission(['VIP', 'editar_adeudos'])) {
            return redirect()->route('home')
            ->with('msg', 'error')
            ->with('msj', 'No tienes permiso para ver esta sección');
        }
       //Consultamos el adeudo y los datos del alumno
        $adeudo = Adeudos::find($request->id);
        $alumno = DB::connection(env('DB_CONNECTION_SECOND'))->table('Alumnos')
            ->where('alu_NumControl', $adeudo->control)
            ->select('alu_NumControl', 'alu_Nombre', 'alu_ApePaterno', 'alu_ApeMaterno', 'car_Clave', 'alu_StatusAct')
            ->first();
        return view('admin.institucion.adeudos.edit', compact('adeudo', 'alumno'));
    }

    public function update(Request $request)
    {
         // Verificamos que el usuario tenga al menos uno de los permisos
         if (!auth()->user()->hasAnyPermission(['VIP', 'editar_adeudos'])) {
            return redirect()->route('home')
            ->with('msg', 'error')
            ->with('msj', 'No tienes permiso para ver esta sección');
        }
        $adeudo = Adeudos::find($request->id);
        $adeudo->control = $request->control;
        $adeudo->status = $request->status;
        $adeudo->fecha_pago = Carbon::now();
        $adeudo->save();
        return redirect()->route('adeudos.index') ->with('success','¡El adeudo se actualizó correctamente!');
    }

    public function destroy(Request $request)
    {
         // Verificamos que el usuario tenga al menos uno de los permisos
         if (!auth()->user()->hasAnyPermission(['VIP', 'eliminar_adeudos'])) {
            return redirect()->route('home')
            ->with('msg', 'error')
            ->with('msj', 'No tienes permiso para ver esta sección');
        }
        $adeudo = Adeudos::find($request->id);
        $adeudo->delete();
        return redirect()->route('adeudos.index') ->with('success','¡El adeudo se eliminó correctamente!');
    }

    public function indexEliminar()
    {
         // Verificamos que el usuario tenga al menos uno de los permisos
         if (!auth()->user()->hasAnyPermission(['VIP', 'eliminar_adeudos'])) {
            return redirect()->route('home')
            ->with('msg', 'error')
            ->with('msj', 'No tienes permiso para ver esta sección');
        }
        // Consultamos todos los adeudos pagados, datos del alumno y carrera
        $adeudos = Adeudos::where('status', 'pagado')->get();
        $controles = $adeudos->pluck('control')->toArray();
        $alumnos = DB::connection(env('DB_CONNECTION_SECOND'))->table('Alumnos')
            ->whereIn('alu_NumControl', $controles)
            ->select('alu_NumControl', 'alu_Nombre', 'alu_ApePaterno', 'alu_ApeMaterno', 'car_Clave', 'alu_StatusAct')
            ->get()
            ->keyBy('alu_NumControl');
            $clavesCarrera = $alumnos->pluck('car_Clave')->unique()->filter()->toArray();
            $carreras = DB::connection(env('DB_CONNECTION_SECOND'))->table('Carreras')
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

        // Verificamos que el usuario tenga al menos uno de los permisos
        if (!auth()->user()->hasAnyPermission(['VIP', 'eliminar_adeudos_todos'])) {
            return redirect()->route('home')
            ->with('msg', 'error')
            ->with('msj', 'No tienes permiso para ver esta sección');
        }
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
            $alumno = DB::connection('contEscSQL')->table('dbo.Alumnos')
                ->where('alu_NumControl', $request->control)
                ->select('alu_Nombre', 'alu_ApePaterno', 'alu_ApeMaterno')
                ->first();

            return response()->json([
                'alumno' => $alumno
            ]);
        }

        // Si hay adeudo, consultamos los datos del adeudo y el área
        $alumno = DB::connection('contEscSQL')->table('dbo.Alumnos')
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
        $alumno = DB::connection(env('DB_CONNECTION_SECOND'))->table('Alumnos')
            ->where('alu_NumControl', $request->controlR)
            ->select('alu_NumControl', 'alu_Nombre', 'alu_ApePaterno', 'alu_ApeMaterno', 'car_Clave', 'alu_StatusAct')
            ->first();
        //Agregamos el nombre de la carrera a la consulta
        $carrera = DB::connection(env('DB_CONNECTION_SECOND'))->table('Carreras')
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
