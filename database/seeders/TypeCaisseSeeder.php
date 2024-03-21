<?php

namespace Database\Seeders;

use App\Models\TypeCaisse;
use Illuminate\Database\Seeder;

class TypeCaisseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeCaisse::factory()
            ->count(5)
            ->create();
    }
}
