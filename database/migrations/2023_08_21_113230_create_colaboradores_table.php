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
        Schema::create('colaboradores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('sexo', 10);
            $table->string('tipo', 10);
            $table->timestamps();
            $table->bigInteger('id_banco')->unsigned()->nullable();
            $table->foreign('id_banco')->references('id')->on('banco')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaboradores');
    }
};
