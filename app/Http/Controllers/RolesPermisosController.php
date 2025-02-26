<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use Alert;

class RolesPermisosController extends Controller
{

    public function index()
    {
        $roles = Role::all();
    	return view('admin.roles.index')
        ->with('roles',$roles);
    }

    public function crearRole()
    {
    	return view('admin.roles.roles_crear');
    }

    public function guardarRole(Request $request){
    	$role = Role::create(['name' => $request->get('name')]);
    	return redirect()->route('admin.roles.index')->with('msg','success')->with('msj','Role creado correctamente');
    }

    public function rolesAsignarPermisosVista($id){
    	$permisos = Permission::leftjoin('role_has_permissions as r',function($join) use($id){
            $join->on('r.permission_id','=','id');
            $join->where('r.role_id','=',$id);
        })->select('name','id','role_id')->get();
    	$role = Role::find($id);
    	return view('admin.roles.roles_asignar_permisos_vista')
    	->with('permisos',$permisos)
    	->with('role',$role);
    }

    public function rolesAsignarPermiso(Request $request)
    {
        $role = Role::findById($request->role_id);

        if ($request->has('permisos_id')) {
            // Buscar los nombres de los permisos basados en los IDs recibidos
            $permisos = Permission::whereIn('id', $request->permisos_id)->pluck('name');

            // Sincronizar los permisos usando los nombres, no los IDs
            $role->syncPermissions($permisos);

            return response()->json("Permisos Agregados correctamente");
        }

        // Si no hay permisos, limpiar los existentes
        $role->syncPermissions([]);

        return response()->json("Permisos eliminados correctamente");
    }

    public function roleVerPermisos(Request $request,$id){
        $user_id = null;
        if($request->has('user_id')) $user_id=$request->user_id;
        $role = Role::findById($id);
        $permisos = $role->permissions;
        return view('admin.roles.role_ver_permisos')
        ->with('permisos',$permisos)
        ->with('role',$role)
        ->with('user_id',$user_id);
    }

    public function editarRole($id){
        $role = Role::findById($id);
        return view('admin.roles.role_editar')
        ->with('role',$role);
    }

    public function actualizarRole(Request $request, $id){
        $role = Role::findById($id);
        $role->name = $request->name;
        $role->save();
        return redirect()->route('admin.roles.index')->with('msg','success')->with('msj','Role actualizado correctamente');
    }

    public function eliminarRole($id){
        $role = Role::find($id);
        if($role==null){
            return redirect()->route('admin.roles.index')->with('msg','error')->with('msj','El rol no existe');
        }
        Role::destroy($id);
        return redirect()->back()->with('msg','success')->with('msj','Role eliminado correctamente');
    }

    public function usuarios($id){
        $role = Role::find($id);
        if($role==null){
            return redirect()->route('admin.roles.index')->with('msg','error')->with('msj','El rol no existe');
        }
        $users = $role->users;
        return view('admin.roles.roles_usuarios')
        ->with('users',$users)
        ->with('role',$role);
    }

    public function usuariosRevocarRol(Request $request, $id){
        $role = Role::find($id);
        if($role==null){
            return redirect()->back()->with('msg','error')->with('msj','El rol no existe');
        }
        if(!$request->has('user_id')){
            return redirect()->back();
        }
        if($request->get('user_id') == Auth::User()->id){
            return redirect()->back()->with('msg','error')->with('msj','No puedes autoeliminarte');
        }
        $user = User::find($request->get('user_id'));
        if($user==null){
            return redirect()->back()->with('msg','error')->with('msj','El usuario no existe');
        }
        $user->removeRole($role->name);
        return redirect()->route('admin.roles.usuarios',$role->id)->with('msg','success')->with('msj','Roles removidos exitosamente');
    }
}
