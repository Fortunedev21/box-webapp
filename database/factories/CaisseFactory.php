<?php

namespace Database\Factories;

use App\Models\Caisse;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CaisseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Caisse::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'identifiant' => $this->faker->uuid(),
            'intitule' => $this->faker->words(2, true),
            'date_debut' => $this->faker->dateTime(),
            'date_echeance' => $this->faker->dateTime(),
            'solde_actuel' => $this->faker->randomNumber(5),
            'status' => $this->faker->word(),
            'utilisateur_id' => rand(1,5),
            'type_caisse_id' => rand(1,5),
            'structure_financiere_id' => rand(1,5)
        ];
    }
}
