<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denuncias', function (Blueprint $table) {
            $table->id();
            $table->string('nomDem',70)->nullable();
            $table->integer('sexoDem')->nullable();
            $table->string('telDem',12)->nullable();
            $table->string('corrDem',50)->nullable();
            $table->string('puestoDem',500)->nullable();
            $table->string('nomAgre',70);
            $table->integer('sexoAgre');
            $table->string('puestoAgre',500);
            $table->string('entAgre',500);
            $table->date('fechaHec');
            $table->string('horaHec',8);
            $table->string('lugHec',200);
            $table->string('freHec',300);
            $table->string('descHec',2000);
            $table->string('nomTes',70)->nullable();
            $table->string('telTes',12)->nullable();
            $table->string('corrTes',50)->nullable();
            $table->string('entTes',500)->nullable();
            $table->string('puestoTes',500)->nullable();
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
        Schema::dropIfExists('denuncias');
    }
};
