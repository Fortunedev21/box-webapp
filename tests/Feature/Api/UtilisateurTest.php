<?php

namespace Tests\Feature\Api;

use App\Models\Utilisateur;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UtilisateurTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = Utilisateur::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_utilisateurs_list(): void
    {
        $utilisateurs = Utilisateur::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.utilisateurs.index'));

        $response->assertOk()->assertSee($utilisateurs[0]->nom);
    }

    /**
     * @test
     */
    public function it_stores_the_utilisateur(): void
    {
        $data = Utilisateur::factory()
            ->make()
            ->toArray();
        $data['password'] = \Str::random('8');

        $response = $this->postJson(route('api.utilisateurs.store'), $data);

        unset($data['password']);
        unset($data['email_verified_at']);
        unset($data['agence']);

        $this->assertDatabaseHas('utilisateurs', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_utilisateur(): void
    {
        $utilisateur = Utilisateur::factory()->create();

        $data = [
            'nom' => $this->faker->name(),
            'prenom' => $this->faker->text(255),
            'email' => $this->faker->unique->email(),
            'lieu_naissance' => $this->faker->text(255),
            'profession' => $this->faker->text(255),
            'identifiant_perso' => $this->faker->text(255),
            'sexe' => $this->faker->text(255),
            'ville_residence' => $this->faker->text(255),
            'code_parainage' => $this->faker->text(255),
            'preference' => [],
            'piece_identite' => $this->faker->text(255),
            'cni' => $this->faker->text(255),
            'numero_imatriculation' => $this->faker->text(255),
            'agence' => [],
        ];

        $data['password'] = \Str::random('8');

        $response = $this->putJson(
            route('api.utilisateurs.update', $utilisateur),
            $data
        );

        unset($data['password']);
        unset($data['email_verified_at']);
        unset($data['agence']);

        $data['id'] = $utilisateur->id;

        $this->assertDatabaseHas('utilisateurs', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_utilisateur(): void
    {
        $utilisateur = Utilisateur::factory()->create();

        $response = $this->deleteJson(
            route('api.utilisateurs.destroy', $utilisateur)
        );

        $this->assertSoftDeleted($utilisateur);

        $response->assertNoContent();
    }
}
