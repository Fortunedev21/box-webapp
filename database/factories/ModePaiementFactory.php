<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ModePaiement;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModePaiementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ModePaiement::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'libelle' => $this->faker->word(),
            'numero' => $this->faker->phoneNumber(),
            'is_confirm' => $this->faker->boolean(),
            'utilisateur_id' => \App\Models\Utilisateur::factory(),
        ];
    }
}
