<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactos extends Model
{
    use HasFactory;
    protected $table="contacto";
    protected $fillable = [
        'nombre','email','telefono','comentarios','id_programa','status'
    ];
}
