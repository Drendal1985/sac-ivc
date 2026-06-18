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
        Schema::create('creditos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('linea_credito_id')
                ->constrained('lineas_credito');

            $table->string('numero_credito')
                ->unique();

            $table->date('fecha_otorgamiento');

            $table->decimal('monto_original', 18, 2);

            $table->decimal('saldo_capital', 18, 2)
                ->default(0);

            $table->integer('cantidad_cuotas');

            $table->decimal('tasa_interes', 10, 4);

            $table->string('estado', 30)
                ->default('ACTIVO');

            $table->text('observaciones')
                ->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creditos');
    }
};
