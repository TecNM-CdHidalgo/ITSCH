<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('sintesis');
            $table->text('contenido');
            $table->string('imagen');            
            $table->string('autor');
            $table->date('fecha_pub');
            $table->date('fecha_fin');
            $table->enum('resaltar', [0,1])->default(0);
            $table->timestamps();
        });
        Storage::makeDirectory('noticias/imagenes');
        Storage::makeDirectory('noticias/archivos');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noticias');
        Storage::deleteDirectory('noticias/imagenes');
        Storage::deleteDirectory('noticias/archivos');
    }
}
