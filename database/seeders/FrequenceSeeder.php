<?php

namespace Database\Seeders;

use App\Models\Frequence;
use Illuminate\Database\Seeder;

class FrequenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Frequence::factory()
            ->count(5)
            ->create();
    }
}
