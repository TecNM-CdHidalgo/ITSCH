<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchivoNoticia extends Model
{
	//Nombre de la tabla
    protected $table="archivos_noticias";

    protected $fillable = [
        'id_not', 'nom_archivo'
    ];
}
