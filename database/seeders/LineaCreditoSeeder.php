<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LineaCredito;

class LineaCreditoSeeder extends Seeder
{
    public function run(): void
    {
        LineaCredito::create([
            'codigo' => 'HC001',
            'nombre' => 'Crédito Habitacional',
            'descripcion' => 'Línea principal de crédito habitacional',
            'cantidad_cuotas_default' => 360,
            'tasa_default' => 4.50,
            'permite_refinanciacion' => true,
            'activa' => true,
        ]);
    }
}
