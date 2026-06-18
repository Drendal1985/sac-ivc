<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LineaCredito extends Model
{
    protected $table = 'lineas_credito';

    protected $fillable = [
        'codigo',
        'nombre',
        'descripcion',
        'cantidad_cuotas_default',
        'tasa_default',
        'permite_refinanciacion',
        'activa',
    ];
}
