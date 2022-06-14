<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    use HasFactory;
    protected $table="denuncias";
    protected $fillable = [
        'nomDem','sexoDem','telDem','corrDem','puestoDem','nomAgre','sexoAgre','puestoAgre','entAgre','fechaHec','horaHec','lugHec','freHec','descHec','nomTes','telTes','corrTes','entTes','puestoTes'
    ];
}
