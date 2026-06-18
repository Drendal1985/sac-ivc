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
        Schema::create('pagos', function (Blueprint $table) {

            $table->id();

            $table->dateTime('fecha_pago');

            $table->string('medio_pago', 50);

            $table->decimal('importe_total', 18, 2);

            $table->string('referencia_externa')
                ->nullable();

            $table->string('archivo_origen')
                ->nullable();

            $table->string('estado', 20)
                ->default('APLICADO');

            $table->timestamps();

            $table->index('fecha_pago');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
