<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organigrama extends Model
{
    use HasFactory;

    protected $table = 'organigrama';

    protected $fillable = [
        'nombre',
        'tipo',
        'id_padre',
        'titular_id'
    ];
}
