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
        Schema::create('documentacions', function (Blueprint $table) {
            $table->id(); // ID principal
            $table->string('curp', 255); // CURP
            $table->string('certificado', 255); // Certificado
            $table->string('cdomi', 255); // Comprobante de domicilio
            $table->string('actanac', 255); // Acta de nacimiento
            $table->unsignedBigInteger('tipoinsc_id'); // Relación con tipoinsc
            $table->unsignedBigInteger('alumnos_id'); // Relación con alumnos
            $table->timestamps();

            // Llaves foráneas
            $table->foreign('tipoinsc_id')->references('id')->on('tipoinscs')->onDelete('cascade');
            $table->foreign('alumnos_id')->references('id')->on('alumnos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentacions');
    }
};

