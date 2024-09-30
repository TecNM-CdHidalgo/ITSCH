<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasesSalida extends Model
{
    use HasFactory;
    protected $table="pases_salidas";
    protected $fillable = [
        'user_id',
        'fecha_solicitud',
        'hora_salida',
        'hora_retorno',
        'estado'
    ];
}
