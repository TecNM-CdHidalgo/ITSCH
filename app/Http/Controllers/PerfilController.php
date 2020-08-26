<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.perfil.index');
    }

    public function miPerfilEditar(){
        return view('admin.perfil.editar');
    }

    public function miPerfilModificar(Request $request){
        $user = User::find(Auth::User()->id);
        $user->name = $request->name;
        $correo_duplicado = User::where([
            ['email','=',$request->get('email')],
            ['id','<>',Auth::User()->id]
            ])->get()->count() > 0;
        if($correo_duplicado){
            return back()->with('error','El correo '.$request->get('email').' ya ha sido ocupado');
        }
        $user->email = $request->email;
        $user->save();
        return redirect()->route('admin.usuarios.mi_perfil')
        ->with('success','Cambios realizados con exito');
    }

    public function miPerfilEditarPassword(){
        return view('admin.perfil.editar_password');
    }

    public function miPerfilModificarPassword(Request $request){
        if(!Hash::check($request->get('pass_anterior'), Auth::User()->password)){
            return back()->with('error','La contraseña ingresada no coincide con la contraseña actual');
        }
        if($request->get('pass_nueva') != $request->get('pass_confirm')){
            return back()->with('error','La nueva contraseña no coincide con la de confirmación');
        }
        $usuario = User::find(Auth::User()->id);
        $usuario->password = bcrypt($request->get('pass_nueva'));
        $usuario->save();
        return redirect()->route('admin.usuarios.mi_perfil')->with('success','Contraseña modificada correctamente');
    }
}
