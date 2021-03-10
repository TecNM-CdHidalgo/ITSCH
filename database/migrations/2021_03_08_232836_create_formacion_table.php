<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formacion', function (Blueprint $table) {
            $table->id();
            $table->string('grado',50);
            $table->string('nombre',100);
            $table->string('institucion_pro',100);
            $table->string('cedula',20);
            $table->bigInteger('id_personal')->unsigned()->nullable();
            $table->foreign('id_personal')->references('id')->on('personal')->onDelete('cascade');
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
        Schema::dropIfExists('formacion');
    }
}
