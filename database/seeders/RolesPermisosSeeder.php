<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear permisos para los usuarios
        $permisos = ['ver-usuarios', 'crear-usuarios', 'editar-usuarios', 'eliminar-usuarios'];

        foreach ($permisos as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }

        // Crear roles y asignar permisos
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->syncPermissions($permisos); // Asignar todos los permisos al rol admin

        $usuario = Role::firstOrCreate(['name' => 'usuario']);
        $usuario->givePermissionTo('ver-usuarios'); // Un usuario normal solo puede ver usuarios
    }
}
