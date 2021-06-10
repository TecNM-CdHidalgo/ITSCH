<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia_especialidad extends Model
{
    use HasFactory;
    protected $table="materias_especialidad";
    protected $fillable = [
        'clave','nombre','nom_archivo','id_programa'
    ];
}
