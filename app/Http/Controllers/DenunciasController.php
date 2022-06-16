<?php

namespace App\Http\Controllers;

use App\Models\Denuncia;
use Illuminate\Http\Request;
use Alert;

class DenunciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('content.buzon.denuncia');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomAgre' => 'required',
            'sexoAgre' => 'required',
            'puestoAgre' => 'required',
            'entAgre' => 'required',
            'fechaHec' => 'required',
            'horaHec' => 'required',
            'lugHec' => 'required',
            'freHec' => 'required',
            'descHec' => 'required',
        ]);


        $denuncia = new Denuncia;

        $denuncia->nomDem = $request->nomDem;
        $denuncia->sexoDem = $request->sexoDem;
        $denuncia->telDem = $request->telDem;
        $denuncia->corrDem = $request->corrDem;
        $denuncia->puestoDem = $request->puestoDem;
        $denuncia->nomAgre = $request->nomAgre;
        $denuncia->sexoAgre = $request->sexoAgre;
        $denuncia->puestoAgre = $request->puestoAgre;
        $denuncia->entAgre = $request->entAgre;
        $denuncia->fechaHec = $request->fechaHec;
        $denuncia->horaHec = $request->horaHec;
        $denuncia->lugHec = $request->lugHec;
        $denuncia->freHec = $request->freHec;
        $denuncia->descHec = $request->descHec;
        $denuncia->nomTes = $request->nomTes;
        $denuncia->telTes = $request->telTes;
        $denuncia->corrTes = $request->corrTes;
        $denuncia->entTes = $request->entTes;
        $denuncia->puestoTes = $request->puestoTes;

        $denuncia->save();

        Alert::success('Correcto','La denuncia fue registrada correctamente');
        return view('content.buzon.denuncia');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Denuncia  $denuncia
     * @return \Illuminate\Http\Response
     */
    public function show(Denuncia $denuncia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Denuncia  $denuncia
     * @return \Illuminate\Http\Response
     */
    public function edit(Denuncia $denuncia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Denuncia  $denuncia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Denuncia $denuncia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Denuncia  $denuncia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Denuncia $denuncia)
    {
        //
    }
}
