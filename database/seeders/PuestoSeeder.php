<?php

namespace Database\Seeders;

use App\Models\Puesto;
use Illuminate\Database\Seeder;

class PuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = ['Docentes', 'Dirección', 'No Docente', 'Auxiliar', 'Administrativo'];

        foreach ($tipos as $tipo) {
            // Crea 3 puestos para cada tipo
            Puesto::factory()->count(1)->create([
                'tipo' => $tipo,
                'nombre' => 'Maestro',
            ]);

            Puesto::factory()->count(1)->create([
                'tipo' => $tipo,
                'nombre' => 'Subdirector',
            ]);
        }
    }
}

