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
        Schema::create('credito_persona', function (Blueprint $table) {

            $table->id();

            $table->foreignId('credito_id')
                ->constrained('creditos')
                ->cascadeOnDelete();

            $table->foreignId('persona_id')
                ->constrained('personas')
                ->cascadeOnDelete();

            $table->string('rol', 30);

            $table->timestamps();

            $table->unique([
                'credito_id',
                'persona_id',
                'rol'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credito_personas');
    }
};
