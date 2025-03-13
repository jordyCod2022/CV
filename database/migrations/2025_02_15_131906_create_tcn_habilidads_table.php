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
        Schema::create('tcn_habilidads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidato_id')->constrained('tcn_candidatos')->onDelete('cascade');
            $table->string('habilidad', 100)->nullable(); // Puede ser NULL si no hay datos
            $table->enum('nivel', ['basico', 'intermedio', 'avanzado'])->nullable();
            $table->string('categoria', 100)->nullable(); // Ej: técnica, blanda, idioma, etc.
            $table->char('estado', 1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tcn_habilidads');
    }
};
