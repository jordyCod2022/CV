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
        Schema::create('tcn_certificacions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidato_id')->constrained('tcn_candidatos')->onDelete('cascade');
            $table->string('nombre_certificacion', 100)->nullable(); // Puede ser NULL si no hay datos
            $table->string('institucion_emisora', 100)->nullable();
            $table->enum('tipo_certificacion', ['tecnica', 'profesional', 'otro'])->nullable();
            $table->date('fecha_emision')->nullable();
            $table->date('fecha_expiracion')->nullable();
            $table->char('estado', 1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tcn_certificacions');
    }
};
