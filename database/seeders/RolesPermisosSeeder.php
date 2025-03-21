<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\User;

class RolesPermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Creamos el usuario administrador si no existe
        $user=User::find(1);
        if($user==null){
            $user = new User();
            $user->name = "Administrador";
            $user->email = "sistemas@cdhidalgo.tecnm.mx";
            $user->password = bcrypt("12345678");
            $user->save();
        }

        // Crear permisos para los usuarios
        $permisos = ['VIP',
            'crear_usuario',
            'editar_usuarios',
            'eliminar_usuarios',
            'ver_usuarios',
            'crear_rol',
            'editar_rol',
            'eliminar_rol',
            'ver_roles',
            'asignar_roles',
            'ver_adeudos',
            'crear_adeudos',
            'editar_adeudos',
            'eliminar_adeudos',
            'eliminar_adeudos_todos',
            'ver_convenios',
            'crear_convenios',
            'editar_convenios',
            'eliminar_convenios',
            'ver_proyectos',
            'crear_proyectos',
            'editar_proyectos',
            'eliminar_proyectos',
            'ver_transparencia',
            'crear_transparencia',
            'editar_transparencia',
            'eliminar_transparencia',
            'ver_carreras',
            'crear_carreras',
            'editar_carreras',
            'eliminar_carreras',
            'ver_biblioteca',
            'crear_biblioteca',
            'ver_pases',
            'crear_pases',
            'editar_pases',
            'eliminar_pases',
            'verificar_pases',
            'solicitar_pases',
            'ver_noticias',
            'crear_noticias',
            'editar_noticias',
            'eliminar_noticias',
            'ver_buzon',
            'editar_buzon',
            'eliminar_buzon',
            'ver_permisos'
        ];

        foreach ($permisos as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }

        // Asignar el permiso VIP al usuario administrador
        $role = Role::firstOrCreate(['name' => 'admin']);
        $role->givePermissionTo('VIP');

        // Asignar el rol de admin al usuario administrador
        $user = User::find(1);
        $user->assignRole('admin');

        // Creamos el rol jefe de carrera y le agregamos los permisos
        $role = Role::firstOrCreate(['name' => 'jefe_carrera']);
        $role->givePermissionTo('ver_carreras');
        $role->givePermissionTo('crear_carreras');
        $role->givePermissionTo('editar_carreras');
        $role->givePermissionTo('eliminar_carreras');
    }
}
