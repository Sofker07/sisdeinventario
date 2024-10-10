<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    protected $table='historial';

    protected $fillable=[
        'numero_de_activo',
        'observaciones',
        'baja',
        'resguardante_correcto',
        'resguardante_nuevo',
        'rfc_resguardante_nuevo',
        'empleado_nuevo',
    ];
}
