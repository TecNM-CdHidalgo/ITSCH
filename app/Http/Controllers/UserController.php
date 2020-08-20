<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::User()->tipo != "Administrador"){
            return redirect()->route('home');
        }
        $usuarios = User::select('id','name','email','tipo')->get();
        return view('admin.usuarios.inicio')
        ->with('usuarios',$usuarios);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::User()->tipo != "Administrador"){
            return redirect()->route('home');
        }
        return View('admin.usuarios.crear');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
         if(Auth::User()->tipo != "Administrador"){
            return redirect()->route('inicio');
        }
        $usuario_existe = User::where('id','=',$id)->get()->count() == 1;
        if(!$usuario_existe){
            return back()->with('error','El usuario no existe');
        }
        $usuario = User::find($id);
        return View('admin.usuarios.editar')
        ->with('usuario',$usuario);
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
         if(Auth::User()->tipo != "Administrador"){
            return redirect()->route('home');
        }
        $usuario_existe = User::where('id','=',$id)->get()->count() == 1;
        if(!$usuario_existe){
            return redirect()->route('admin.usuario.inicio')->with('error','El usuario no existe');
        }
        
        if($request->get('name') == null){
            return back()->with('error','Debe ingresar el nombre del usuario');
        }
        if($request->get('email') == null){
            return back()->with('error','Es necesario ingresar el correo');
        }
        if($request->get('pass_nueva') != null || $request->get('pass_confirm') != null){
            if($request->get('pass_nueva') == null){
                return back()->with('error','Debe ingresar la nueva contraseña');
            }
            if($request->get('pass_confirm') == null){
                return back()->with('error','Debe ingresar la contraseña de confirmación');
            }
            if($request->get('pass_nueva') != $request->get('pass_confirm')){
                return back()->with('error','La nueva contraseña no coincide con la de confirmación');
            }
        }
        $usuario = User::find($id);
        $correo_duplicado = User::where([
            ['email','=',$request->get('email')],
            ['id','<>',$id]
            ])->get()->count() > 0;
        if($correo_duplicado){
            return back()->with('error','El correo '.$request->get('email').' ya ha sido ocupado');
        }
        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');
        $usuario->tipo = $request->get('tipo');
        if($request->get('pass_nueva') != null && $request->get('pass_confirm') != null){
            $usuario->password = bcrypt($request->get('pass_nueva'));
        }
        $usuario->save();
        return redirect()->route('admin.usuarios.inicio')->with('success','Usuario modificado con exito!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(Auth::User()->tipo != "Administrador"){
            return redirect()->route('home');
        }
        if(!$request->has('id')) return redirect()->route('home');
        $usuario_existe = User::find($request->id);
        if($usuario_existe != null){
            User::destroy($request->id);
        }else{
            return back()->with('error','El usuario no existe');
        }
        return back()->with('success','El usuario fue eliminado con exito!!!');
    }


    public function save(Request $request)
    {
         if(Auth::User()->tipo != "Administrador"){
            return redirect()->route('inicio');
        }
        if($request->get('password') == null){
            return back()->with('error','Debe ingresar una contraseña');
        }
        if($request->get('confirm') == null){
            return back()->with('error','Debe confirmar la contraseña');
        }
        if($request->get('name') == null){
            return back()->with('error','Debe ingresar el nombre del usuario');
        }
        if($request->get('email') == null){
            return back()->with('error','Es necesario ingresar el correo');
        }
        if($request->get('password') != $request->get('confirm')){
            return back()->with('error','Las contraseñas no coinciden');
        }
        $correo_duplicado = User::where('email','=',$request->get('email'))->get()->count() > 0;
        if($correo_duplicado){
            return back()->with('error','El correo '.$request->get('email').' ya ha sido ocupado');
        }
        
        $usuario = new User($request->all());
        $usuario->password = bcrypt($request->get('password'));
        $usuario->save();
        return redirect()->route('admin.usuarios.inicio')->with('success','El usuario fue creado con exito!!!');
    }
}
