<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transparencia extends Model
{
    use HasFactory;
    //Nombre de la tabla para la que va a funcionar el modelo
    protected $table="transparencia";
    //Datos que se usaran en el modelo
    protected $fillable = [
        'nom_arch','id_periodo','nombre'
    ];
}
