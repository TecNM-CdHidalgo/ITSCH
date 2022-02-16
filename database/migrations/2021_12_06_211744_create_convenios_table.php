<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConveniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Crea la tabla de areas
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->timestamps();
        });

        //Crea la tabla de convenios
        Schema::create('convenios', function (Blueprint $table) {
            $table->id();
            $table->string('tipo',30);
            $table->string('institucion',200);
            $table->date('inicio');
            $table->string('fin',35);
            $table->string('convenio',200)->nullable();
            $table->timestamps();
        });

        //Crea la tabla de relación entre convenios y areas
        Schema::create('convenios_areas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_area')->unsigned()->nullable();
            $table->bigInteger('id_convenio')->unsigned()->nullable();
            //Llaves foraneas
            $table->foreign('id_area')->references('id')->on('areas')->onDelete('cascade');
            $table->foreign('id_convenio')->references('id')->on('convenios')->onDelete('cascade');
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
        Schema::dropIfExists('convenios_areas');
        Schema::dropIfExists('convenios');
        Schema::dropIfExists('areas');
    }
}
