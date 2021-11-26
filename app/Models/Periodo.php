<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;
    //Nombre de la tabla para la que va a funcionar el modelo
    protected $table="periodos_trans";
    //Datos que se usaran en el modelo
    protected $fillable = [
        'nombre'
    ];
}
