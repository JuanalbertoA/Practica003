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
        Schema::create('grupo21318s', function (Blueprint $table) {
            $table->id();
            $table->string('grupo', 50); // Identificador único del grupo
            $table->string('descripcion', 255)->nullable(); // Descripción opcional
            $table->date('fecha'); // Fecha
            $table->integer('max_alumnos'); // Máximo de alumnos
            $table->foreignId('personal_id')->constrained()->conDelete('cascade'); // Relación con 'personals'
            $table->foreignId('materia_abierta_id')->constrained()->onDelete('cascade'); // Relación con 'materias'
            $table->foreignId('periodo_id')->constrained()->onDelete('cascade'); // Relación con 'periodos'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupo21318s');
    }
};
