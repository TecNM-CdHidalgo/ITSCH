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
        Schema::create('pases_salidas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // Usuario que solicita el pase de salida
            $table->date('fecha_solicitud'); // Fecha de la solicitud
            $table->time('hora_salida'); // Hora de salida
            $table->time('hora_retorno')->nullable(); // Hora de retorno (máximo 3 horas después)
            $table->string('motivo')->nullable(); // Motivo de la salida
            $table->enum('estado', ['pendiente', 'aprobado', 'denegado'])->default('pendiente')->nullable(); // Estado del pase
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
        Schema::dropIfExists('pases_salidas');
    }
};
