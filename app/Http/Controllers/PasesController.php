<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Departamento;

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
    public function store()
    {
        return view('admin.institucion.pases.create');
    }


}
