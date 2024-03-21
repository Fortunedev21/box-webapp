<?php

namespace Database\Factories;

use App\Models\Frequence;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FrequenceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Frequence::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'libelle' => $this->faker->word(),
            'heure' => $this->faker->time(),
            'jours' => json_encode(['key' => $this->faker->word()]),
            'caisse_id' => \App\Models\Caisse::factory(),
        ];
    }
}
