<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reticula extends Model
{
    use HasFactory;
    protected $table="reticulas";
    protected $fillable = [
       'nom_arch_ret','id_programa','id_especialidad'
    ];
}
