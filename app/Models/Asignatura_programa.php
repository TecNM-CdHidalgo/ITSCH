<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura_programa extends Model
{
    use HasFactory;
    protected $table="asignaturas_programa";
    protected $fillable = [
        'clave','nombre','nom_archivo','id_programa'
    ];
}
