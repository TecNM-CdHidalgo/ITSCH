<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('organigrama', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');        // Nombre del nivel (ej., "Dirección General")
            $table->string('tipo');          // Tipo de nivel ('Direccion General', 'Direccion de Area', 'Subdireccion', 'Departamento')
            $table->bigInteger('id_padre')->unsigned()->nullable()->foreignId('id_padre')  // ID del nivel superior
                  ->constrained('organigrama')   // Establece la relación con la misma tabla
                  ->nullOnDelete();              // Si el nivel superior se elimina, establecer NULL
            $table->bigInteger('titular_id')->unsigned()->nullable()
            ->foreign('titular_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organigrama');
    }
};
