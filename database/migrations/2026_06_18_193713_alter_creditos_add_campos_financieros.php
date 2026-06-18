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
        Schema::table('creditos', function (Blueprint $table) {

            $table->string('indice_actualizacion')
                ->nullable()
                ->after('tasa_interes');

            $table->date('fecha_primer_vencimiento')
                ->nullable()
                ->after('fecha_otorgamiento');

        });
    }

    public function down(): void
    {
        Schema::table('creditos', function (Blueprint $table) {

            $table->dropColumn([
                'indice_actualizacion',
                'fecha_primer_vencimiento'
            ]);

        });
    }
};
