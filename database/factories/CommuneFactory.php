<?php

namespace Database\Factories;

use App\Models\Commune;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommuneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Commune::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->word(),
            'departement_id' => \App\Models\Departement::factory(),
        ];
    }
}
