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
        Schema::create('tcn_experiencia_laboral', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidato_id')->constrained('tcn_candidatos')->onDelete('cascade');
            $table->string('empresa', 100)->nullable(); // Puede ser NULL si no hay datos
            $table->string('puesto', 100)->nullable(); // Puede ser NULL si no hay datos
            $table->text('descripcion')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->char('estado', 1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tcn_experiencia_laborals');
    }
};
