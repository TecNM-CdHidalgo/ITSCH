<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriteriosDesempenoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criterios_desempeno', function (Blueprint $table) {
            $table->id();
            $table->string('numero',5);
            $table->string('descripcion',1000);
            $table->bigInteger('id_atributos')->unsigned()->nullable();
            $table->foreign('id_atributos')->references('id')->on('atributos')->onDelete('cascade');
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
        Schema::dropIfExists('criterios_desempeno');
    }
}
