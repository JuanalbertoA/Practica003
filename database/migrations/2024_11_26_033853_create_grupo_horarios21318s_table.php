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
        Schema::create('grupo_horarios21318s', function (Blueprint $table) {
            $table->id(); // Crea la columna 'id' como clave primaria
            // Usar foreignId para grupo_id
            $table->foreignId('grupo_id')->constrained('grupo21318s') // Relación con la tabla 'grupo21318s'
                  ->onDelete('cascade') // Elimina en cascada
                  ->onUpdate('cascade'); // Actualiza en cascada

            // Usar foreignId para lugar_id
            $table->foreignId('lugar_id') // Llave foránea relacionada con la tabla 'lugares'
                  ->constrained('lugares')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            
            // Día de la semana (TINYINT)
            $table->string('dia');
            // Hora (TIME)
            $table->string('hora');
            $table->timestamps(); // Añade created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Elimina la tabla si existe
        Schema::dropIfExists('grupo_horarios21318s');
    }
};
