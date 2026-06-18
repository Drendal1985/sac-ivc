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
        Schema::create('cuotas', function (Blueprint $table) {

            $table->id();

            $table->foreignId('credito_id')
                ->constrained('creditos')
                ->cascadeOnDelete();

            $table->integer('numero_cuota');

            $table->date('fecha_vencimiento');

            $table->decimal('capital', 18, 2);
            $table->decimal('interes', 18, 2);

            $table->decimal('punitorio', 18, 2)
                ->default(0);

            $table->decimal('importe_original', 18, 2);

            $table->decimal('saldo', 18, 2);

            $table->string('estado', 30)
                ->default('PENDIENTE');

            $table->timestamps();

            $table->index([
                'credito_id',
                'fecha_vencimiento'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuotas');
    }
};
