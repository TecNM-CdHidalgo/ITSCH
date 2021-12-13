<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Convenio;
use App\Models\Area;
use App\Models\Area_Convenio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ConvenioController extends Controller
{
    public function index()
    {
        $areas=Area::all();
        $convenios=Convenio::select('convenios.*','areas.nombre AS nom_area')
        ->join('convenios_areas','convenios.id','=','convenios_areas.id_convenio')
        ->join('areas','areas.id','=','convenios_areas.id_area')
        ->get();

        return view('admin.contenido.convenios.index')
        ->with('areas',$areas)
        ->with('convenios',$convenios);
    }

    public function areasIndex(Request $request)
    {
        //Funcion para llamar a la vista general de areas
        $areas=Area::all();
        return view('admin.contenido.convenios.areas')
        ->with('areas',$areas);
    }

    public function save(Request $request)
    {
        //Iniciamos la transacción
        DB::beginTransaction();
        try
        {
             //Guardamos el convenio
             $convenio=new Convenio;
             $convenio->tipo=$request->tipo;
             $convenio->institucion=$request->institucion;
             $convenio->inicio=$request->inicio;
             //Se revisa si el check de fecha indefinida esta activo y en caso afirmativo se guarda esa palabra en la BD
             if($request->indefinido=="on")
             {
                $convenio->fin="Indefinido";
             }
             else
             {
                $convenio->fin=$request->fin;
             }
             $convenio->save();

             //Obtenemos el id del ultimo registro insertado
             $u_reg = Convenio::latest('id')->first();

            //Codigo para cargar los archivos de las carreras
            if(!Storage::has('public/convenios/'.$u_reg->id))
            {
                Storage::makeDirectory('public/convenios/'.$u_reg->id);
            }
            if($request->has('convenio'))
            {
                $file =$request->convenio;
                $archExtension = $file->getClientOriginalExtension();
                $archExtension = strtolower($archExtension);
                if($archExtension == 'pdf' || $archExtension == 'PDF' ){
                    $path = storage_path().'/app/public/convenios/'.$u_reg->id;
                    $name = 'convenio'.time().'.'.strtolower($archExtension);
                    $file->move($path,$name);
                    //Modificamos el nombre del archivo en la tabla de convenios
                    $convenio=Convenio::find($u_reg->id);
                    $convenio->convenio=$name;
                    $convenio->save();
                }
                else
                {
                    return Redirect()->back()->with('error','¡La extencion del archivo no es valida! solo se aceptan PDF');
                }
            }
            else
            {
                return Redirect()->back()->with('error','¡No se encontro ningún archivo adjunto');
            }
            foreach($request->areas as $area)
            {
                $area_convenio=new Area_convenio;
                $area_convenio->id_area=$area;
                $area_convenio->id_convenio=$u_reg->id;
                $area_convenio->save();
            }
        }
        // Ha ocurrido un error, devolvemos la BD a su estado previo y hacemos lo que queramos con esa excepción
        catch (\Exception $e)
        {
            DB::rollback();
            return Redirect()->back()->with('error','¡A ocurrido un error!');
        }
        // Hacemos los cambios permanentes ya que no han habido errores
        DB::commit();
        return Redirect()->route('convenios.inicio')
        ->with('success','¡El convenio se dio de alta correctamente!');
    }

    public function destroy(Request $request)
    {
        DB::beginTransaction();

        try
        {
            $convenio = Convenio::find($request->id_convenio);
            //Eliminamos la carpeta con todos los archivos del periodo
            Storage::deleteDirectory('public/transparencia/'.$request->id_convenio);
            $convenio->delete();

            DB::commit();
            return Redirect()->route('convenios.inicio')->with('warning','¡El convenio se elimino correctamente!');
        }
        catch (\Exception $e)
        {
            DB::rollback();
            return Redirect()->back()->with('error','¡El periodo no se pudo eliminar, ocurrio un error!');
        }
    }


    public function saveArea(Request $request)
    {
        //Funcion para guardar las nuevas áreas
        $area=new Area;
        $area->nombre=$request->nombre;
        $area->save();

        return redirect()->route('convenios.inicio')
        ->with('success','El Área se guardo correctamente');
    }

    public function areasUpdate(Request $request)
    {
        //Función que modifica las áreas
        $area=Area::find($request->id_area);
        $area->nombre=$request->nombre;
        $area->save();

        return Redirect()->back()->with('warning','¡El area se modifico correctamente!');
    }

    public function areasDestroy(Request $request)
    {
        //Función para eliminar las áreas
        $area=Area::find($request->id_areaE);
        $area->delete();

        return Redirect()->back()->with('warning','¡El area se elimino correctamente!');
    }
}
