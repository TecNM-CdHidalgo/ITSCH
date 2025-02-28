<?php

use Illuminate\Database\Seeder;

use App\User;
use Database\Seeders\RolesPermisosSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesPermisosSeeder::class); // Llamamos al seeder de Roles y Permisos
    }
}
