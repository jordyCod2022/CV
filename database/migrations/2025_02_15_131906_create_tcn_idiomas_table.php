<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::create('tcn_idiomas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidato_id')->constrained('tcn_candidatos')->onDelete('cascade');
            $table->string('idioma', 50)->nullable(); // Puede ser NULL si no hay datos
            $table->enum('nivel', ['basico', 'intermedio', 'avanzado', 'nativo'])->nullable();
            $table->char('estado', 1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tcn_idiomas');
    }
};
