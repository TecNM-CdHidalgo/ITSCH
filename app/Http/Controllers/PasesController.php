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
    public function indexPases()
    {
        $areas = Area::all();
        $departamentos = Departamento::all();
        return view('admin.institucion.pases');
    }


}
