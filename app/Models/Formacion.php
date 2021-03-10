<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formacion extends Model
{
    use HasFactory;
    protected $table="formacion";
    protected $fillable = [
        'grado','nombre','institucion_pro','cedula','id_personal'
    ];
}
