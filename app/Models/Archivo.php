<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;
    protected $table="archivos";
    protected $fillable = [
        'nom_img_carr','nom_arch_ret','nom_arch_piid','nom_img_acred','id_programa'
    ];
}
