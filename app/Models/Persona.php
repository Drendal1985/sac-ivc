<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'personas';

    protected $fillable = [
        'tipo_persona',
        'tipo_documento',
        'numero_documento',
        'cuit',
        'apellido',
        'nombre',
        'razon_social',
        'fecha_nacimiento',
        'email',
        'telefono',
        'estado',
    ];

    public function creditos()
    {
        return $this->belongsToMany(
            Credito::class,
            'credito_persona'
        )->withPivot('rol');
    }
}
