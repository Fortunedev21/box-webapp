<?php

namespace Tests\Feature\Api;

use App\Models\Utilisateur;
use App\Models\ModePaiement;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UtilisateurModePaiementsTest extends TestCase
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
    public function it_gets_utilisateur_mode_paiements(): void
    {
        $utilisateur = Utilisateur::factory()->create();
        $modePaiements = ModePaiement::factory()
            ->count(2)
            ->create([
                'utilisateur_id' => $utilisateur->id,
            ]);

        $response = $this->getJson(
            route('api.utilisateurs.mode-paiements.index', $utilisateur)
        );

        $response->assertOk()->assertSee($modePaiements[0]->libelle);
    }

    /**
     * @test
     */
    public function it_stores_the_utilisateur_mode_paiements(): void
    {
        $utilisateur = Utilisateur::factory()->create();
        $data = ModePaiement::factory()
            ->make([
                'utilisateur_id' => $utilisateur->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.utilisateurs.mode-paiements.store', $utilisateur),
            $data
        );

        unset($data['is_confirm']);

        $this->assertDatabaseHas('mode_paiements', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $modePaiement = ModePaiement::latest('id')->first();

        $this->assertEquals($utilisateur->id, $modePaiement->utilisateur_id);
    }
}
