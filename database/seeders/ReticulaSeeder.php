<?php

namespace Database\Seeders;

use App\Models\Carrera;
use App\Models\Reticula;
use Illuminate\Database\Seeder;

class ReticulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reticula::factory(10)->create(); // Genera 10 retículas con carreras aleatorias
    }

}

