<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImputacionPago extends Model
{
    protected $table = 'imputaciones_pago';

    public $timestamps = false;

    protected $fillable = [
        'pago_id',
        'cuota_id',
        'importe_capital',
        'importe_interes',
        'importe_punitorio',
        'importe_total',
        'created_at',
    ];

    public function pago()
    {
        return $this->belongsTo(Pago::class);
    }

    public function cuota()
    {
        return $this->belongsTo(Cuota::class);
    }
}