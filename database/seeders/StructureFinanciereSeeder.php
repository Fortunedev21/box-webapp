<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StructureFinanciere;

class StructureFinanciereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StructureFinanciere::factory()
            ->count(5)
            ->create();
    }
}
