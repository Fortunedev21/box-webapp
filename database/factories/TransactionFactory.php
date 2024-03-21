<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'montant' => $this->faker->randomNumber(5),
            'identifiant_transation' => $this->faker->uuid(),
            'identifiant_paiement' => $this->faker->uuid(),
            'date_transaction' => $this->faker->dateTime(),
            'status' => $this->faker->word(),
            'caisse_id' => rand(1,5)
        ];
    }
}
