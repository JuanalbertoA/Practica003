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
        Schema::create('grupos', function (Blueprint $table) {
            $table->id(); // ID autoincremental BIGINT
            $table->string('grupo', 5); // Grupo VARCHAR(5)
            $table->string('descripcion', 200)->nullable(); // Descripción VARCHAR(200)
            $table->integer('max_alumnos'); // Máximo de alumnos INT
            $table->foreignId('periodo_id') // Relación con periodo
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('materia_id') // Relación con materia
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('personal_id') // Relación con personal
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};

