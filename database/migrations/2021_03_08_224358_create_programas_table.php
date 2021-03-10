<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Programas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->string('plan_estudios',30);
            $table->string('definicion',1000);
            $table->string('mision',1000);
            $table->string('vision',1000);
            $table->string('politica',1000);
            $table->string('objetivo',1000);
            $table->string('per_ingreso',1000);
            $table->string('per_egreso',1000);
            $table->string('campo',1000);
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
        Schema::dropIfExists('programas');
    }
}
