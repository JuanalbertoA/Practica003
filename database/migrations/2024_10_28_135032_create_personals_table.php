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
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->string('RFC', 100); // RFC (VARCHAR(100))
            $table->string('nombres', 50); // nombres (VARCHAR(50))
            $table->string('apellidop', 50); // apellidop (VARCHAR(50))
            $table->string('apellidom', 50); // apellidom (VARCHAR(50))
            $table->string('licenciatura', 200); // licenciatura (VARCHAR(200))
            $table->boolean('lictit'); // lictit (TINYINT(1))
            $table->string('especializacion', 200); // especializacion (VARCHAR(200))
            $table->boolean('esptit'); // esptit (TINYINT(1))
            $table->string('maestria', 200); // maestria (VARCHAR(200))
            $table->boolean('maetit'); // maetit (TINYINT(1))
            $table->string('doctorado', 200); // doctorado (VARCHAR(200))
            $table->boolean('doctit'); // doctit (TINYINT(1))
            $table->date('fechaingsep'); // fechaingsep (DATE)
            $table->date('fechaingins'); // fechaingins (DATE)
            $table->foreignId('depto_id')->constrained(); // depto_id (BIGINT) con relación
            $table->foreignId('puesto_id')->constrained(); // puesto_id (BIGINT) con relación
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personals');
    }
};
