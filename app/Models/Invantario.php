<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invantario extends Model
{
    use HasFactory;

    protected $table='inventario';

    protected $fillable=[
        'numero_de_activo',
        'descripcion',
        'numero_de_serie',
        'modelo',
        'marca',
        'costo_actual',
        'inventario_nacional',
        'clave_ur',
        'resguardante_actual',
        'rfc_resguardante',
        'empleado',
        'inventariado',
    ];
}