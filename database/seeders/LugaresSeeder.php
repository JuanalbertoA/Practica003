<?php

namespace Database\Seeders;

use App\Models\Lugares;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LugaresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lugares::factory(10)->create();
    }
}
