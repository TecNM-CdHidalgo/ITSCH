<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivosNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos_noticias', function (Blueprint $table) {
            $table->id();
            $table->biginteger('id_not')->unsigned();
            $table->string('nom_archivo',50);

            $table->foreign('id_not')->references('id')->on('noticias')->onDelete('cascade');
            
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
        Schema::dropIfExists('archivos_noticias');
    }
}
