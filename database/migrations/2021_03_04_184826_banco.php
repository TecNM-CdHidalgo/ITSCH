<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Banco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banco', function (Blueprint $table) {
            $table->id();
            $table->string('carrera',60);
            $table->string('proyecto',300);
            $table->integer('vacantes');
            $table->string('empresa',200);
            $table->string('direccion',300);
            $table->string('telefono',25);
            $table->string('correo',60);
            $table->string('docente',100);
            $table->string('colaboradores',1000)->nullable();
            $table->string('alumnos',1000)->nullable();
            $table->string('inicio',30)->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banco');
    }
}
