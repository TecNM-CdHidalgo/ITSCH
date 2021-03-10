<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa_especialidad extends Model
{
    use HasFactory;
    protected $table="programas_especialidad";
    protected $fillable = [
        'nombre','nom_archivo','id_especialidades'
    ];
}
