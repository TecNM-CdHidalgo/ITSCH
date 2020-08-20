<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Administrador";
        $user->email = "sistemas@cdhidalgo.tecnm.mx";
        $user->tipo = "Administrador";
        $user->password = bcrypt("12345678");
        $user->save();
    }
}
