<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Alert;
use App\Models\Banco;
use App\Models\Convenio;
use App\Models\Colaborador;
use Illuminate\Support\Facades\Auth;

class BancoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::User()->tipo != "administrador" && Auth::User()->tipo != "academica" && Auth::User()->tipo != "vinculacion"){
            return redirect()->route('home');
        }
        $banco = Banco::orderBy('created_at','desc')->get();
        return View('admin.contenido.banco_pro.index')->with('banco',$banco);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $convenios=Convenio::all(); //Obtenemos todos los convenios
        return view('admin.contenido.banco_pro.crear')->with('convenios',$convenios);
    }

    public function store(Request $request)
    {
        if(Auth::User()->tipo != "administrador" && Auth::User()->tipo != "academica" && Auth::User()->tipo != "vinculacion"){
            return redirect()->route('home');
        }

        $Banco = new Banco;
        $Banco->carrera = $request->carrera;
        $Banco->proyecto = $request->proyecto;
        $Banco->vacantes = $request->vacantes;
        $Banco->empresa = $request->empresa;
        $Banco->tipo = $request->tipo;
        $Banco->area = $request->area;
        $Banco->direccion = $request->direccion;
        $Banco->telefono = $request->telefono;
        $Banco->correo = $request->correo;
        $Banco->docente = $request->docente;
        $Banco->id_convenio = $request->id_convenio;
        $Banco->inicio = $request->inicio;
        $Banco->status = $request->status;

        $Banco->save();

        Alert::success('Correcto','El proyecto fue agregado correctamente.');
        return redirect()->route('admin.contenido.banco.index');
    }



    public function show($op)
    {
       //Funcion que visualiza el banco de proyectos en la pagina principal

       //Si la opción es 1 consultamos solo los abiertos
        if($op==1)
        {
            $banco = Banco::orderBy('created_at','desc')->where('status',1)->get();
        }
        elseif($op==2)
        {
            $banco = Banco::orderBy('created_at','desc')->where('status',2)->get();
        }
        elseif($op==3)
        {
            $banco = Banco::orderBy('created_at','desc')->where('status',3)->get();
        }
        elseif($op==4)
        {
            $banco = Banco::orderBy('created_at','desc')->get();
        }

        //Consultamos el numero de vacantes disponibles por proyecto
        foreach ($banco as $ban) {
            $colaboradores = Colaborador::where('id_banco', $ban->id)->count();
            $ban->vacantes_disponibles = $ban->vacantes - $colaboradores;
        }

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
        if(Auth::User()->tipo != "administrador" && Auth::User()->tipo != "academica" && Auth::User()->tipo != "vinculacion"){
            return redirect()->route('home');
        }
        $convenios=Convenio::all();
        $banco = Banco::where('id',$id)->first();
        return View('admin.contenido.banco_pro.editar')->with('banco',$banco)->with('convenios',$convenios);
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
        $Banco->area = $request->area;
        $Banco->id_convenio = $request->id_convenio;
        $Banco->tipo = $request->tipo;
        $Banco->observaciones = $request->observaciones;
        $Banco->inicio = $request->inicio;
        if($request->status!="")
        {
            $Banco->status = $request->status;
        }
        $Banco->save();
        Alert::success('Correcto','El proyecto fue modificado correctamente.');
        return redirect()->route('admin.contenido.banco.ver',$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::User()->tipo != "administrador" && Auth::User()->tipo != "academica" && Auth::User()->tipo != "vinculacion"){
            return redirect()->route('home');
        }

        Banco::where('id', $id)->delete();
        Alert::warning('Correcto','El proyecto fue eliminado correctamente.');
        return redirect()->route('admin.contenido.banco.index');
    }

    //Función para ver mas detalles de cada proyecto
    public function ver($id)
    {
        $proyecto = Banco::where('id',$id)->first();
        $colaboradores=Colaborador::where('id_banco',$id)->get();
        $convenio=Convenio::where('id',$proyecto->id_convenio)->first();
        return View('admin.contenido.banco_pro.detalle')->with('proyecto',$proyecto)->with('colaboradores',$colaboradores)->with('convenio',$convenio);
    }

    //Función para visualizar todos los proyectos en la sección publica
    public function verPublico($id)
    {
        $proyecto = Banco::where('id',$id)->first();
        $colaboradores=Colaborador::where('id_banco',$id)->get();
        $convenio=Convenio::where('id',$proyecto->id_convenio)->first();
        return View('content.vinculacion.detalleBanco')->with('proyecto',$proyecto)->with('colaboradores',$colaboradores)->with('convenio',$convenio);
    }

    //Función para agregar colaboradores al proyecto
    public function createColaboradores($id)
    {
        $proyecto = Banco::select('id','proyecto')->where('id',$id)->first();
        return View('admin.contenido.banco_pro.colaboradores')->with('proyecto',$proyecto);
    }

    //Función para guardar los colaboradores
    public function storeColaboradores($id)
    {
        //Consultamos el numero de bacantes del bacho de proyectos para saber cuantos colaboradores se pueden agregar
        $banco = Banco::select('vacantes')->where('id',$id)->first();
        //Consultamos el numero de colaboradores que ya tiene el proyecto
        $colaboradores = Colaborador::where('id_banco',$id)->count();
        //Si el numero de colaboradores es menor al numero de vacantes se pueden agregar mas colaboradores
        if($colaboradores<$banco->vacantes)
        {
            $colaborador = new Colaborador;
            $colaborador->nombre = request('nombre');
            $colaborador->sexo = request('sexo');
            $colaborador->tipo = request('tipo');
            $colaborador->id_banco = $id;
            $colaborador->save();
            return redirect()->route('admin.contenido.banco.ver',$id);
        }
        else
        {
            Alert::warning('Error','El proyecto ya cuenta con el numero maximo de colaboradores.');
            return redirect()->route('admin.contenido.banco.ver',$id);
        }
    }

    //Función para llamar al index de los reportes
    public function reportesIndex()
    {
        //Consultamos la lista de convenios
        $convenios=Convenio::all();
        return view('admin.contenido.banco_pro.reportes',compact('convenios'));
    }

    //Función para generar el reporte de los convenios
    public function reportesConvenios(Request $request)
    {
        //Retornamos un json con los datos de los convenios
        $convenios=Convenio::where('id',$request->id)->get();
        //Consultamos los proyectos que pertenecen al convenio
        foreach ($convenios as $convenio) {
            $convenio->proyectos = Banco::where('id_convenio',$convenio->id)->get();
        }

        //Obtenemos los colaboradores de cada proyecto y que sean profesores
        foreach ($convenios as $convenio) {
            foreach ($convenio->proyectos as $proyecto) {
                $proyecto->colaboradoresProfes = Colaborador::where('id_banco',$proyecto->id)->where('tipo','Profesor')->get();
            }
        }

        //Obtenemos los colaboradores de cada proyecto y que sean alumnos
        foreach ($convenios as $convenio) {
            foreach ($convenio->proyectos as $proyecto) {
                $proyecto->colaboradoresAlumnos = Colaborador::where('id_banco',$proyecto->id)->where('tipo','Alumno')->get();
            }
        }

        //Obtenemos el numero de alumnos hombres y mujeres de cada proyecto
        foreach ($convenios as $convenio) {
            foreach ($convenio->proyectos as $proyecto) {
                $proyecto->TotColAluHom = Colaborador::where('id_banco',$proyecto->id)->where('tipo','Alumno')->where('sexo','Masculino')->count();
                $proyecto->TotColAluMuj = Colaborador::where('id_banco',$proyecto->id)->where('tipo','Alumno')->where('sexo','Femenino')->count();
            }
        }


        return response()->json($convenios);
    }

    //Función para generar el reporte de los proyectos de cada convenio
    public function repConvProy(Request $request)
    {
        //Consultamos todos los convenios
        $convenios=Convenio::select('id','institucion','tipo')->get();
        //Contamos los proyectos de cada convenio
        foreach ($convenios as $convenio) {
            $convenio->proyectos = Banco::where('id_convenio',$convenio->id)->count();
            //Agregamos el nombre de cada proyecto registrado
            $convenio->nombreProyectos = Banco::select('proyecto')->where('id_convenio',$convenio->id)->get();
        }
        return response()->json($convenios);
    }

    //Función para consultar los proyectos registrados por área
    public function repConvArea(Request $request)
    {
        //Consultamos el banco de proyectos y filtramos por area
        $proyectos = Banco::where('area',$request->area)->get();
        return response()->json($proyectos);
    }


}
