<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('grupos', function (Blueprint $table) {
            // Eliminar la clave foránea existente
            $table->dropForeign(['materia_id']);
            $table->dropColumn('materia_id');

            // Crear la nueva relación con `materia_abiertas`
            $table->foreignId('materia_abierta_id')
                ->after('periodo_id') // Ajusta la posición según tu preferencia
                ->constrained('materia_abiertas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('grupos', function (Blueprint $table) {
            // Revertir el cambio

            // Restaurar la relación original con `materias`
            $table->foreignId('materia_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }
};


