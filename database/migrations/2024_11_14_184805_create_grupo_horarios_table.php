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
            $table->id(); // Clave primaria (id BIGINT)
            $table->bigInteger('grupo_id')->unsigned(); // grupo_id BIGINT
            $table->bigInteger('lugar_id')->unsigned(); // lugar_id BIGINT
            $table->tinyInteger('dia'); // dia TINYINT (0 a 255)
            $table->time('hora'); // hora TIME
            $table->timestamps(); // created_at y updated_at TIMESTAMP

            // Definición de llaves foráneas (si existen relaciones)
            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');
            $table->foreign('lugar_id')->references('id')->on('lugares')->onDelete('cascade');
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
