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
        Schema::create('registro_biblio', function (Blueprint $table) {
            $table->id();
            $table->string('control',10);
            $table->string('car_Clave',2);
            $table->string('servicio',40);
            $table->string('sexo',1);
            $table->string('extras',100)->nullable();
            $table->timestamp('salida')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_biblio');
    }
};
