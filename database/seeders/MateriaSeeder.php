<?php

namespace Database\Seeders;

use App\Models\Materia;
use App\Models\Reticula;
use Illuminate\Database\Seeder;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Materia::factory(45)->create();
    }
}
