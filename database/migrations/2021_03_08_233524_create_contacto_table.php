<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacto', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',150)->nullable();            
            $table->string('email',50);            
            $table->string('telefono',15)->nullable();     
            $table->string('comentarios',1500); 
            $table->integer('status')->default(0)->unsigned(); 
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
        Schema::dropIfExists('contacto');
    }
}
