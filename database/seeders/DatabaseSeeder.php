<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UtilisateurSeeder::class);
        $this->call(CommuneSeeder::class);
        $this->call(DepartementSeeder::class);
        $this->call(TypeCaisseSeeder::class);
        $this->call(ModePaiementSeeder::class);
        $this->call(StructureFinanciereSeeder::class);
        $this->call(CaisseSeeder::class);
        $this->call(FrequenceSeeder::class);
        $this->call(TransactionSeeder::class);
    }
}
