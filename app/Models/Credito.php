<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Credito extends Model
{
    use HasFactory;

    protected $table = 'creditos';

    public function personas()
    {
        return $this->belongsToMany(
            Persona::class,
            'credito_persona'
        )->withPivot('rol');
    }

    public function titular()
    {
        return $this->personas()
            ->wherePivot('rol', 'TITULAR');
    }

    public function cotitulares()
    {
        return $this->personas()
            ->wherePivot('rol', 'COTITULAR');
    }

    public function cuotas()
    {
        return $this->hasMany(Cuota::class);
    }

    public function pagos()
    {
        return $this->hasManyThrough(
            Pago::class,
            Cuota::class
        );
    }
}
