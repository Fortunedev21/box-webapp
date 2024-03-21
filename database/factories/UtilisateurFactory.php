<?php

namespace Database\Factories;

use App\Models\Utilisateur;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UtilisateurFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Utilisateur::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->firstName(),
            'prenom' => $this->faker->lastName(),
            'email' => $this->faker->unique->email(),
            'email_verified_at' => now(),
            'password' => \Hash::make('password'),
            'remember_token' => Str::random(10),
            'lieu_naissance' => $this->faker->date(),
            'profession' => $this->faker->jobTitle(),
            'identifiant_perso' => $this->faker->uuid(),
            'sexe' => $this->faker->randomLetter(),
            'ville_residence' => $this->faker->city(),
            'code_parainage' => $this->faker->randomNumber(),
            'preference' => json_encode(['key' => $this->faker->word()]),
            'piece_identite' => $this->faker->text(),
            'cni' => $this->faker->randomNumber(),
            'numero_imatriculation' => $this->faker->randomNumber(),
            'agence' => json_encode(['key' => $this->faker->word()]),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
