<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    use HasFactory;
    //Nombre de la tabla para la que va a funcionar el modelo
    protected $table="banco";
    //Datos que se usaran en el modelo
    protected $fillable = [
        'carrera','proyecto','vacantes','empresa','direccion','telefono','correo','docente','colaboradores','alumnos'
    ];
}
