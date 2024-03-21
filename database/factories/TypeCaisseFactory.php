<?php

namespace Database\Factories;

use App\Models\TypeCaisse;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TypeCaisseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TypeCaisse::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'libelle' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'status' => $this->faker->word(),
        ];
    }
}
