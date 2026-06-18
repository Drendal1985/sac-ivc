<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('imputaciones_pago', function (Blueprint $table) {

            $table->id();

            $table->foreignId('pago_id')
                ->constrained('pagos')
                ->cascadeOnDelete();

            $table->foreignId('cuota_id')
                ->constrained('cuotas')
                ->cascadeOnDelete();

            $table->decimal('importe_capital', 18, 2)
                ->default(0);

            $table->decimal('importe_interes', 18, 2)
                ->default(0);

            $table->decimal('importe_punitorio', 18, 2)
                ->default(0);

            $table->decimal('importe_total', 18, 2);

            $table->timestamps();

            $table->index('pago_id');
            $table->index('cuota_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imputacion_pagos');
    }
};
