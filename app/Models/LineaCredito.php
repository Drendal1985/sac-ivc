<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaCredito extends Model
{
    use HasFactory;

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

    protected $casts = [
        'permite_refinanciacion' => 'boolean',
        'activa' => 'boolean',
        'tasa_default' => 'decimal:4',
    ];

    /**
     * Créditos asociados a la línea
     */
    public function creditos()
    {
        return $this->hasMany(
            Credito::class,
            'linea_credito_id'
        );
    }
}