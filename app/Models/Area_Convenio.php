<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area_Convenio extends Model
{
    use HasFactory;
    //Nombre de la tabla para la que va a funcionar el modelo
    protected $table="convenios_areas";
    //Datos que se usaran en el modelo
    protected $fillable = [
        'id_area','id_convenio'
    ];
}
