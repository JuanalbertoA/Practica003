<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposTable extends Migration
{
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->string('grupo', 50); // Identificador único del grupo
            $table->string('descripcion', 255)->nullable(); // Descripción opcional
            $table->date('fecha'); // Fecha
            $table->integer('max_alumnos'); // Máximo de alumnos
            $table->foreignId('personal_id')->constrained()->conDelete('cascade'); // Relación con 'personals'
            $table->foreignId('materia_abierta_id')->constrained()->onDelete('cascade'); // Relación con 'materias'
            $table->foreignId('periodo_id')->constrained()->onDelete('cascade')->nullable(); // Relación con 'periodos'
            $table->timestamps(); // Timestamps para 'created_at' y 'updated_at'
        });
    }

    public function down()
    {
        Schema::dropIfExists('grupos');
    }
}



