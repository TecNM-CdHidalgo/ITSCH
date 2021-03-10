<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignaturasProgramaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas_programa', function (Blueprint $table) {
            $table->id();
            $table->string('clave',30);
            $table->string('nombre',50);
            $table->string('nom_archivo',100);
            $table->bigInteger('id_programa')->unsigned()->nullable();
            $table->foreign('id_programa')->references('id')->on('programas')->onDelete('cascade');
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
        Schema::dropIfExists('asignaturas_programa');
    }
}
