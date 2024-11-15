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
            $table->id(); // Clave primaria (id BIGINT)
            $table->string('grupo', 5); // grupo VARCHAR(5)
            $table->string('descripcion', 200); // descripcion VARCHAR(200)
            $table->integer('max_alumnos'); // max_alumnos INT
            $table->bigInteger('periodo_id')->unsigned(); // periodo_id BIGINT
            $table->bigInteger('materia_id')->unsigned(); // materia_id BIGINT
            $table->bigInteger('personal_id')->unsigned(); // personal_id BIGINT
            $table->timestamps(); // created_at y updated_at TIMESTAMP

            // Definición de llaves foráneas (si existen relaciones)
            $table->foreign('periodo_id')->references('id')->on('periodos')->onDelete('cascade');
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');
            $table->foreign('personal_id')->references('id')->on('personal')->onDelete('cascade');
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

