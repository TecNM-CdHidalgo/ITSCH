<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreasController extends Controller
{
    public function index()
    {
         //Funcion para llamar a la vista general de areas
         $areas=Area::all(); 
         return view('admin.institucion.areas.index')
         ->with('areas',$areas);
       
    }

    public function save(Request $request)
    {
        //Verificamos que el usuario tenga al menos uno de los permisos
        if (!auth()->user()->hasAnyPermission(['VIP', 'crear_convenios'])) {
            return redirect()->route('home')
            ->with('msg', 'error')
            ->with('msj', 'No tienes permiso para ver esta sección');
        }
       
        //Si no cumple con la validación regresamos a la vista anterior con un mensaje de error
        if ($request->nombre == null) {
            return redirect()->back()
            ->with('msg', 'error')
            ->with('msj', 'El campo nombre no puede estar vacío');
        }
        //Si lla existe regresamos un error a la vista anterior
        if (Area::where('nombre', $request->nombre)->exists()) {
            return redirect()->back()
            ->with('msg', 'error')
            ->with('msj', 'El área ya existe');
        }
        
        //Funcion para guardar las nuevas áreas
        $area=new Area;
        $area->nombre=$request->nombre;
        $area->save();

        return redirect()->route('areas.inicio')
        ->with('msg', 'success')
        ->with('msj','El Área se guardo correctamente');
    }

    public function update(Request $request)
    {
        //Verificamos que el usuario tenga al menos uno de los permisos
        if (!auth()->user()->hasAnyPermission(['VIP', 'crear_convenios'])) {
            return redirect()->route('home')
            ->with('msg', 'error')
            ->with('msj', 'No tienes permiso para ver esta sección');
        }

        //Función que modifica las áreas
        $area=Area::find($request->id_area);
        $area->nombre=$request->nombreMod;
        $area->save();

        return redirect()->route('areas.inicio')
        ->with('msg', 'success')
        ->with('msj','¡El área se modifico correctamente!');dd(session()->all());
    }

    public function destroy(Request $request)
    {
        //Verificamos que el usuario tenga al menos uno de los permisos
        if (!auth()->user()->hasAnyPermission(['VIP', 'crear_convenios'])) {
            return redirect()->route('home')
            ->with('msg', 'error')
            ->with('msj', 'No tienes permiso para ver esta sección');
        }

        //Función para eliminar las áreas
        $area=Area::find($request->id_areaE);
        $area->delete();

        return Redirect()->back()->with('msg', 'warning')->with('msj','¡El area se elimino correctamente!');
    }
}
