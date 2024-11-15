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
        Schema::create('personalplazas', function (Blueprint $table) {
            $table->id(); // Esta es la clave primaria (id BIGINT)
            $table->smallInteger('tiponombramiento'); // tiponombramiento SMALLINT
            $table->bigInteger('plaza_id'); // plaza_id BIGINT
            $table->bigInteger('personal_id'); // personal_id BIGINT
            $table->timestamps(); // created_at y updated_at TIMESTAMP
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personalplazas');
    }
};

