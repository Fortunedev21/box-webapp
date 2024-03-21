<?php

namespace Tests\Feature\Api;

use App\Models\Caisse;
use App\Models\Utilisateur;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UtilisateurCaissesTest extends TestCase
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
    public function it_gets_utilisateur_caisses(): void
    {
        $utilisateur = Utilisateur::factory()->create();
        $caisses = Caisse::factory()
            ->count(2)
            ->create([
                'utilisateur_id' => $utilisateur->id,
            ]);

        $response = $this->getJson(
            route('api.utilisateurs.caisses.index', $utilisateur)
        );

        $response->assertOk()->assertSee($caisses[0]->intitule);
    }

    /**
     * @test
     */
    public function it_stores_the_utilisateur_caisses(): void
    {
        $utilisateur = Utilisateur::factory()->create();
        $data = Caisse::factory()
            ->make([
                'utilisateur_id' => $utilisateur->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.utilisateurs.caisses.store', $utilisateur),
            $data
        );

        $this->assertDatabaseHas('caisses', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $caisse = Caisse::latest('id')->first();

        $this->assertEquals($utilisateur->id, $caisse->utilisateur_id);
    }
}
