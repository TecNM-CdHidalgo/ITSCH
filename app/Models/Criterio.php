<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criterio extends Model
{
    use HasFactory;
    protected $table="criterios";
    protected $fillable = [
        'numero','descripcion','id_atributos'
    ];

     //Relacion con la tablas de credito(uno) - Actividades(muchos)
     public function atributos()
     {
         //Agregamos el campo id_atributo ya que es el campo que enlaza con la tabla atributos, para hacer la busqueda
         return $this->belongsTo('App\Models\Atributo','id_atributo');
     }
}
