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
        Schema::create('permisos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // Usuario que solicita el permiso
            $table->date('fecha_solicitud'); // Fecha en que se realiza la solicitud
            $table->date('fecha_inicio'); // Fecha de inicio del permiso
            $table->integer('dias_solicitados'); // Número de días solicitados
            $table->boolean('goce_sueldo')->default(true); // Con o sin goce de sueldo
            $table->foreignId('aprobado_por')->nullable()->constrained('users'); // Jefe que aprueba o deniega
            $table->enum('estado', ['pendiente', 'aprobado', 'denegado'])->default('pendiente'); // Estado del permiso
            $table->date('fecha_aprobacion')->nullable(); // Fecha de aprobación/denegación
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
        Schema::dropIfExists('permisos');
    }
};
