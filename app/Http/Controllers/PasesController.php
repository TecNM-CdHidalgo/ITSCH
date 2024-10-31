<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Departamento;
use App\Models\PasesSalida;

class PasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas = Area::all();
        $departamentos = Departamento::all();
        return view('admin.institucion.pases.index', compact('areas', 'departamentos'));
    }

    /**
     * llamma a la vista para crear un nuevo pase
     */
    public function create()
    {
        $areas = Area::all();
        $departamentos = Departamento::all();
        return view('admin.institucion.pases.create', compact('areas', 'departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        PasesSalida::create($request->all());

        return redirect()->route('pases.index')
            ->with('success', 'Pase de salida creado correctamente.');
    }


}
