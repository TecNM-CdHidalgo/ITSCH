<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReticulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reticulas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_programa')->unsigned()->nullable();
            $table->string('nom_arch_ret')->nullable();
            $table->bigInteger('id_especialidad')->unsigned()->nullable();            
            $table->foreign('id_programa')->references('id')->on('programas')->onDelete('cascade');
            $table->foreign('id_especialidad')->references('id')->on('especialidades')->onDelete('cascade');
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
        Schema::dropIfExists('reticulas');
    }
}
