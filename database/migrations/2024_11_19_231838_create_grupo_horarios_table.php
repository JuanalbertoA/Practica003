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
        Schema::create('grupo_horarios', function (Blueprint $table) {
            $table->id(); // ID autoincremental (BIGINT)
            $table->foreignId('grupo_id') // Llave foránea relacionada con la tabla 'grupos'
                  ->constrained('grupos')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('lugar_id') // Llave foránea relacionada con la tabla 'lugares'
                  ->constrained('lugares')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->string('dia'); // Día de la semana (TINYINT)
            $table->string('hora'); // Hora (TIME)
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupo_horarios');
    }
};
