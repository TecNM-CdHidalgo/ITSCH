<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atributo extends Model
{
    use HasFactory;
    protected $table="atributos";
    protected $fillable = [
        'numero','descripcion','id_programa'
    ];

    //Relacion con la tablas de Atributos(uno) - Criterios(muchos)
    public function criterios()
    {
        return $this->hasMany('App\Models\Criterio');
    }
}
