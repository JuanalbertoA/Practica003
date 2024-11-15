<?php

namespace Database\Seeders;

use App\Models\Personal;
use App\Models\Depto;
use App\Models\Puesto;
use Illuminate\Database\Seeder;

class PersonalSeeder extends Seeder
{
    public function run()
    {
        // Supongamos que el departamento de ISC tiene un id específico
        $deptoISC = Depto::where('nombre', 'ISC')->first()->id;

        // Asumimos que el puesto de maestro tiene un id específico
        $puestoMaestro = Puesto::where('nombre', 'Maestro')->first()->id;
        $puestoDirector = Puesto::where('nombre', 'Director')->first()->id;
        $puestoSubdirector = Puesto::where('nombre', 'Subdirector')->first()->id;

        // Generar 10 maestros de ISC
        Personal::factory()->count(10)->create([
            'depto_id' => $deptoISC,
            'puesto_id' => $puestoMaestro,
        ]);

        // Generar 1 director
        Personal::factory()->create([
            'depto_id' => $deptoISC, // o cualquier otro departamento
            'puesto_id' => $puestoDirector,
        ]);

        // Generar 3 subdirectores
        Personal::factory()->count(3)->create([
            'depto_id' => $deptoISC, // o cualquier otro departamento
            'puesto_id' => $puestoSubdirector,
        ]);
    }
}
