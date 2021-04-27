<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',30);
            $table->string('ap_paterno',50);
            $table->string('ap_materno',50)->nullable();
            $table->string('email',50);
            $table->string('puesto',200);
            $table->string('telefono',15)->nullable();
            $table->integer('extension')->nullable();            
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
        Schema::dropIfExists('personal');
    }
}
