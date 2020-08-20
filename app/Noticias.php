<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    protected $fillable = [
        'titulo', 'sintesis', 'contenido','imagen','autor','fecha_pub','fecha_fin','resaltar'
    ];
}
