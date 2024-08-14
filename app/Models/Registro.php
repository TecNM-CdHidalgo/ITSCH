<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;
    protected $table="registro_biblio";
    protected $fillable = [
        'control','car_Clave','servicio','sexo','extras','salida'
    ];
}
