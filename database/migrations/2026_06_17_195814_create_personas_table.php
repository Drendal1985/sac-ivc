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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();

            $table->string('tipo_persona', 20);

            $table->string('tipo_documento', 20)->nullable();
            $table->string('numero_documento', 20)->nullable();

            $table->string('cuit', 20)->nullable();

            $table->string('apellido')->nullable();
            $table->string('nombre')->nullable();

            $table->string('razon_social')->nullable();

            $table->date('fecha_nacimiento')->nullable();

            $table->string('email')->nullable();
            $table->string('telefono')->nullable();

            $table->string('estado', 20)->default('ACTIVO');

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['tipo_documento', 'numero_documento']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
