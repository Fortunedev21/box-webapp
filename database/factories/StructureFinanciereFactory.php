<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\StructureFinanciere;
use Illuminate\Database\Eloquent\Factories\Factory;

class StructureFinanciereFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StructureFinanciere::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'identifiant' => $this->faker->uuid(),
            'denomination' => $this->faker->company(),
            'date_creation' => $this->faker->date(),
            'email' => $this->faker->companyEmail(),
            'siege_social' => $this->faker->address(),
            'agrement' => $this->faker->word(),
            'site_internet' => $this->faker->url(),
            'statut_juridique' => $this->faker->word(),
            'numero_inscription' => $this->faker->randomNumber(),
            'boite_postal' => $this->faker->randomNumber(),
            'immatriculation' => json_encode(['key' => $this->faker->word()]),
            'phone' => json_encode(['key' => $this->faker->word()]), 
            'cellulaire' => json_encode(['key' => $this->faker->word()]),
            'fax' => json_encode(['key' => $this->faker->word()]),
            'taux_interet' => $this->faker->randomNumber(),
            'delai_retrait_fond' => $this->faker->word(),
        ];
    }
}
