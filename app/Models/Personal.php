<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    protected $table="personal";
    protected $fillable = [
        'nombre','ap_paterno','ap_materno','email','puesto','telefono','extension','facebook','id_programa'
    ];
}
