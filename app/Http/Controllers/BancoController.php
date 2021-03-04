<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Banco;

class BancoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $banco = Banco::orderBy('created_at','desc')->paginate(5);            
        return View('admin.contenido.banco_pro.index')->with('banco',$banco); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contenido.banco_pro.crear'); 
    }

    public function store(Request $request)
    {
        $Banco = new Banco;

        $Banco->carrera = $request->carrera;
        $Banco->proyecto = $request->proyecto;
        $Banco->vacantes = $request->vacantes;
        $Banco->empresa = $request->empresa;
        $Banco->direccion = $request->direccion;
        $Banco->telefono = $request->telefono;
        $Banco->correo = $request->correo;
        $Banco->docente = $request->docente;

        $Banco->save();

        return redirect()->route('admin.contenido.banco.index'); 
    }
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       //Funcion que visualiza el banco de proyectos en la pagina principal
       $banco = Banco::orderBy('created_at','desc')->paginate(5);
       return View('content.vinculacion.banco_de_datos')->with('banco',$banco);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banco = Banco::where('id',$id)->get();               
        return View('admin.contenido.banco_pro.editar')->with('banco',$banco); 
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
        $Banco = Banco::find($id);
        $Banco->carrera = $request->carrera;
        $Banco->proyecto = $request->proyecto;
        $Banco->vacantes = $request->vacantes;
        $Banco->empresa = $request->empresa;
        $Banco->direccion = $request->direccion;
        $Banco->telefono = $request->telefono;
        $Banco->correo = $request->correo;
        $Banco->docente = $request->docente;

        $Banco->save();
        return redirect()->route('admin.contenido.banco.index'); 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banco::where('id', $id)->delete();
        return redirect()->route('admin.contenido.banco.index'); 
    }
}
