<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permisos extends Model
{
    use HasFactory;
    protected $table="permisos";
    protected $fillable = [
        'user_id',
        'fecha_solicitud',
        'fecha_inicio',
        'dias_solicitados',
        'goce_sueldo',
        'aprobado_por',
        'estado',
        'fecha_aprobacion'
    ];
}
