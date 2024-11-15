<?php

namespace Database\Seeders;

use App\Models\Edificios;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EdificiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Edificios::factory()->createMany([
            ['nombreedificio' => 'Edificio Industrial', 'nombrecorto' => '13'],
            ['nombreedificio' => 'Edificio D', 'nombrecorto' => '17'],
            ['nombreedificio' => 'Edificio H', 'nombrecorto' => '16'],
            ['nombreedificio' => 'Edificio K', 'nombrecorto' => '9'],
            ['nombreedificio' => 'Edificio E', 'nombrecorto' => '10'],
            ['nombreedificio' => 'Edificio L', 'nombrecorto' => '11'],
            ['nombreedificio' => 'Edificio A', 'nombrecorto' => '7'],
            ['nombreedificio' => 'Edificio J', 'nombrecorto' => '8'],
        ]);
    }
}
