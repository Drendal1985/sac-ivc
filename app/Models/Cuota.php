<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cuota extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cuotas';

    public function credito()
    {
        return $this->belongsTo(Credito::class);
    }

    public function imputacionesPago()
    {
        return $this->hasMany(ImputacionPago::class);
    }
}
