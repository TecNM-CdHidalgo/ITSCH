<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programa;
use Illuminate\Support\Facades\DB;
use App\Models\Especialidad;

class CarrerasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programas=DB::table('programas')->select('id','nombre')->get();
        $pro_act=Programa::find(1);
        return view('admin.contenido.carreras.index')
        ->with('programas',$programas)
        ->with('pro_act',$pro_act);
    }

    /*Metodo para agregar y editar los programas educativos de la institución */
    public function editCarrera()
    {
        $programas=Programa::all();
        return view('admin.contenido.carreras.editcarreras')->with('programas',$programas);
    }

    /*Metodo para agregar los programas educativos de la institución */
    public function storeCarrera(Request $request)
    {
        $programa = new Programa;
        $programa->nombre = $request->nombre;
        $programa->save();
        return redirect()->route('carreras.editCarrera');
    }

    /*Metodo para modificar solo el nombre del programa educativo de la institución */
    public function updateCarrera(Request $request, $id)
    {
        $programa = Programa::find($id);
        $programa->nombre = $request->nombre;
        $programa->save();
        return redirect()->route('carreras.editCarrera');
    }

    /*Metodo para eliminar los programas educativos de la institución */
    public function destroyCarrera($id)
    {
        $programa = Programa::find($id);
        $programa->delete();
        return redirect()->route('carreras.editCarrera');
    }

    /*Edicion de especialidades*/
    public function editEspecialidad($id)
    {
        $especialidades=Especialidad::where('id_programa',$id);
        return view('admin.contenido.carreras.especialidades')->with('especialidades',$especialidades);
    }

    //Metodo para agregar contenido a los programas educativos
    public function updatecarreracom(Request $request, $id)
    {
        dd("Si llega");
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Mostramos carrera especifica
    public function show($id)
    {
        $programas=DB::table('programas')->select('id','nombre')->get();
        $pro_act=Programa::find($id);       
        return view('admin.contenido.carreras.index')
        ->with('programas',$programas)
        ->with('pro_act',$pro_act);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
