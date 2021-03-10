<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramasEspecialidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programas_especialidad', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->string('nom_archivo',100);
            $table->bigInteger('id_especialidades')->unsigned()->nullable();
            $table->foreign('id_especialidades')->references('id')->on('especialidades')->onDelete('cascade');
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
        Schema::dropIfExists('programas_especialidad');
    }
}
