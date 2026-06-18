<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Credito extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'creditos';

    protected $fillable = [

        'linea_credito_id',
        'numero_credito',
        'fecha_otorgamiento',
        'fecha_primer_vencimiento',
        'monto_original',
        'saldo_capital',
        'cantidad_cuotas',
        'tasa_interes',
        'indice_actualizacion',
        'estado',
        'observaciones'
    ];

    protected $casts = [

        'fecha_otorgamiento' => 'date',
        'fecha_primer_vencimiento' => 'date',
        'monto_original' => 'decimal:2',
        'saldo_capital' => 'decimal:2',
        'tasa_interes' => 'decimal:4'
    ];

    /**
     * Línea de crédito
     */
    public function lineaCredito()
    {
        return $this->belongsTo(
            LineaCredito::class,
            'linea_credito_id'
        );
    }

    /**
     * Personas asociadas
     */
    public function personas()
    {
        return $this->belongsToMany(
            Persona::class,
            'credito_persona'
        )->withPivot('rol')
         ->withTimestamps();
    }

    /**
     * Cuotas
     */
    public function cuotas()
    {
        return $this->hasMany(
            Cuota::class
        );
    }
}