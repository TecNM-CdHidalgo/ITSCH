<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Buzon;
use Illuminate\Support\Facades\Auth;


class BuzonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('content.buzon.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mensaje=new Buzon;
        $mensaje->tipo=$request->tipo;
        $mensaje->nombre=$request->nombre;
        $mensaje->correo=$request->correo;
        $mensaje->mensaje=$request->mensaje;
        $mensaje->status=0;
        $mensaje->save();

        return redirect()->route('contenido.buzon.index')
        ->with('success','Tu mensaje se envió correctamente. En breve te daremos una respuesta, saludos y gracias por tu colaboración');
    }


    public function show()
    {
        if(Auth::User()->tipo != "administrador" && Auth::User()->tipo != "academica" && Auth::User()->tipo != "planeacion"){
            return redirect()->route('home')
            ->with('error','No tiene permisos para ver esta sección');
        }
        $msj=Buzon::where('status',0)->get();
        return view('admin.buzon.show')
        ->with('msj',$msj);
    }

    public function leidos()
    {
        $msj=Buzon::where('status',1)->get();
        return view('admin.buzon.show')
        ->with('msj',$msj);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::User()->tipo != "administrador" && Auth::User()->tipo != "academica" && Auth::User()->tipo != "planeacion"){
            return redirect()->route('home')
            ->with('error','No tiene permisos para ver esta sección');
        }
        $msj=Buzon::find($id);
        $msj->status=1;
        $msj->save();

        return view('admin.buzon.ver')
        ->with('msj',$msj);
    }



    public function destroy(Request $request)
    {
        if(Auth::User()->tipo != "administrador" && Auth::User()->tipo != "academica" && Auth::User()->tipo != "planeacion"){
            return redirect()->route('home')
            ->with('error','No tiene permisos para ver esta sección');
        }

        $msj=Buzon::find($request->id);
        $msj->delete();

        return redirect()->route('buzon.show')
        ->with('success','El mensaje se elimino correctamente');
    }
}
