<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adeudos extends Model
{
    use HasFactory;
    protected $table="adeudos";
    protected $fillable = [
        'control',
        'area_id',
        'status',
        'concepto',
        'fecha_adeudo',
        'fecha_pago'
    ];
}
