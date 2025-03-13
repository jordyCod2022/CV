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
        Schema::create('tcn_candidatos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('email', 100)->unique();
            $table->timestamp('email_verified_at')->nullable(); // Para verificación de correo
            $table->string('verification_token')->nullable(); // Token para verificación
            $table->string('telefono', 20)->nullable();
            $table->string('direccion', 255)->nullable();
            $table->string('ciudad', 100)->nullable();
            $table->string('pais', 100)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->enum('genero', ['M', 'F', 'O'])->nullable();
            $table->enum('estado_civil', ['soltero', 'casado', 'divorciado', 'viudo'])->nullable();
            $table->string('nacionalidad', 100)->nullable();
            $table->string('linkedin', 255)->nullable();
            $table->string('foto', 255)->nullable();
            $table->string('curriculum', 255)->nullable(); // Ruta del currículum
            $table->char('estado', 1)->nullable(); // 'A' para activo, 'I' para inactivo
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tcn_candidatos');
    }

};
