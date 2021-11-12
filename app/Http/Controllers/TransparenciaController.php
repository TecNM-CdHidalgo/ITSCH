<?php

namespace App\Http\Controllers;

use App\Models\Transparencia;
use Illuminate\Http\Request;

class TransparenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docs=Transparencia::all();
        return view('admin.contenido.transparencia.index')
        ->with('docs',$docs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $periodo=$request->periodo;
        return view('admin.contenido.transparencia.crear')
        ->with('periodo',$periodo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd('Si llega');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\transparencia  $transparencia
     * @return \Illuminate\Http\Response
     */
    public function show(transparencia $transparencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transparencia  $transparencia
     * @return \Illuminate\Http\Response
     */
    public function edit(transparencia $transparencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transparencia  $transparencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transparencia $transparencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transparencia  $transparencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(transparencia $transparencia)
    {
        //
    }
}
