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
        Schema::create('lineas_credito', function (Blueprint $table) {
            $table->id();

            $table->string('codigo', 50)->unique();
            $table->string('nombre');

            $table->text('descripcion')->nullable();

            $table->integer('cantidad_cuotas_default')->nullable();

            $table->decimal('tasa_default', 10, 4)->nullable();

            $table->boolean('permite_refinanciacion')
                ->default(true);

            $table->boolean('activa')
                ->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('linea_creditos');
    }
};
