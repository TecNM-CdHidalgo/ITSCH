<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criterio_desempeno extends Model
{
    use HasFactory;
    protected $table="criterios_desempeno";
    protected $fillable = [
        'numero','descripcion','id_atributos'
    ];
}
