<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PersonalPlaza;
use App\Models\PersonalPlazas;

class PersonalplazasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear 50 registros de personalplazas
        PersonalPlazas::factory()->count(5)->create();
    }
}

