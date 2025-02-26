<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Obtenemos todos los usuarios y sus roles asignados

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
        if(Auth::User()->tipo != "administrador"){
            return redirect()->route('home');
        }
        $roles = Role::all();  // Obtener todos los roles
        return view('admin.usuarios.crear', compact('roles'));  // Pasar los roles a la vista

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
         if(Auth::User()->tipo != "administrador"){
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
        if(Auth::User()->tipo != "administrador"){
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
        if(Auth::User()->tipo != "administrador"){
            return redirect()->route('home');
        }
        $usuario_existe = User::where('id','=',$request->id)->get()->count() == 1;
        if($usuario_existe == null){
            return response()->json(['error'=>'El usuario no existe']);
        }else{
            $usuario = User::find($request->id);
            $usuario->delete();
        }
        return response()->json(['exito']);
    }


    public function save(Request $request)
    {
        if(Auth::User()->tipo != "administrador"){
            return redirect()->route('inicio');
        }
        if($request->get('password') == null){
            return back()->with('msg','error')->with('msj','Debe ingresar una contraseña');
        }
        if($request->get('confirm') == null){
            return back()->with('msg','error')->with('msj','Debe confirmar la contraseña');
        }
        if($request->get('name') == null){
            return back()->with('msg','error')->with('msj','Debe ingresar el nombre del usuario');
        }
        if($request->get('email') == null){
            return back()->with('msg','error')->with('msj','Es necesario ingresar el correo');
        }
        if($request->get('password') != $request->get('confirm')){
            return back()->with('msg','error')->with('msj','Las contraseñas no coinciden');
        }
        if($request->get('roles') == null){
            return back()->with('msg','error')->with('msj','Debe seleccionar el(los) role(s) de usuario');
        }
        $correo_duplicado = User::where('email','=',$request->get('email'))->get()->count() > 0;
        if($correo_duplicado){
            return back()->with('msg','error')->with('msj','El correo '.$request->get('email').' ya ha sido ocupado');
        }

        $usuario = new User($request->all());
        $usuario->password = bcrypt($request->get('password'));
        // Asignar los roles al usuario
        if ($request->has('roles')) {
            $usuario->syncRoles($request->roles);  // Asignar múltiples roles
        }
        $usuario->save();
        return redirect()->route('admin.usuarios.inicio')->with('msg','success')->with('msj', 'Usuario creado exitosamente!');
    }

    public function asignarRoles($id){
        $user = User::find($id);
        if(true){
            $roles_data = DB::table('roles')->leftjoin('model_has_roles as model',function($join) use($id){
                $join->on('model.role_id','=','roles.id');
                $join->where('model.model_type','=','App\user');
                $join->where('model.model_id','=',$id);
            })->leftjoin('users',function($join) use($id){
                $join->on('users.id','=','model.model_id');
                $join->where('users.id','=',$id);
            })->select('users.name as user_name','roles.name','roles.id as id')->get();
            return view('admin.usuarios.asignar_roles')
            ->with('roles',$roles_data)
            ->with('user',$user);
        }else{
            $permisos = Auth::User()->getPermissionsViaRoles();
            $arreglo_roles = array();
            foreach (Role::all() as $role) {
                $temp_permisos_role = $role->permissions;
                $valido = true;
                for ($x=0; $x < count($temp_permisos_role); $x++) {
                    $tiene_permiso = false;
                    for ($y=0; $y < count($permisos); $y++) {
                        if($temp_permisos_role[$x]->name == $permisos[$y]->name){
                            $tiene_permiso = true;
                            break;
                        }
                    }
                    if(!$tiene_permiso){
                        $valido = false;
                        break;
                    }
                }
                if($valido){
                    array_push($arreglo_roles,$role->name);
                }
            }
            $roles_data = DB::table('roles')->leftjoin('model_has_roles as model',function($join) use($id){
                $join->on('model.role_id','=','roles.id');
                $join->where('model.model_type','=','App\user');
                $join->where('model.model_id','=',$id);
            })->leftjoin('users',function($join) use($id){
                $join->on('users.id','=','model.model_id');
                $join->where('users.id','=',$id);
            })->whereIn("roles.name",$arreglo_roles)->select('users.name as user_name','roles.name','roles.id as id')->get();
            return view('admin.usuarios.asignar_roles')
            ->with('roles',$roles_data)
            ->with('user',$user)
            ->with('area',$area);
        }

    }

    public function guardarRoles(Request $request)
    {
        if (!$request->has('user_id')) {
            return redirect()->route('admin.usuarios.inicio')->with('msg','error')->with("msj", "Usuario no encontrado");
        }

        $user = User::find($request->user_id);

        if (!$user) {
            return redirect()->route('admin.usuarios.inicio')->with('msg','error')->with("msj", "Usuario no encontrado");
        }

        if ($request->has('roles_id') && !empty($request->roles_id)) {
            // Obtener los nombres de los roles basados en los IDs recibidos
            $roles = Role::whereIn('id', $request->roles_id)->pluck('name')->toArray();

            // Sincronizar los roles con el usuario
            $user->syncRoles($roles);
        } else {
            // Si no se enviaron roles, eliminar los existentes
            $user->syncRoles([]);
        }

        return redirect()->route('admin.usuarios.inicio')->with('msg','success')->with("msj", "Roles asignados correctamente");
    }
}
