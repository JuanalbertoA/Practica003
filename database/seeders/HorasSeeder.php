<?php

namespace Database\Seeders;

use App\Models\Horas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HorasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Horas::factory(10)->create();
    }
}
