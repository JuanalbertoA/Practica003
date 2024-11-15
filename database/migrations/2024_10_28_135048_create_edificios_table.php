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
        Schema::create('edificios', function (Blueprint $table) {
            $table->id();
            $table->string('nombreedificio', 30); // Campo nombreedificio con longitud máxima de 30 caracteres
            $table->string('nombrecorto', 5); // Campo nombrecorto con longitud máxima de 5 caracteres
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('edificios');
    }
};
