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
        Schema::create('tcn_referencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidato_id')->constrained('tcn_candidatos')->onDelete('cascade');
            $table->string('nombre_referencia', 100)->nullable(); // Puede ser NULL si no hay datos
            $table->string('telefono_referencia', 20)->nullable();
            $table->string('email_referencia', 100)->nullable();
            $table->string('relacion', 100)->nullable();
            $table->char('estado', 1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tcn_referencias');
    }
};
