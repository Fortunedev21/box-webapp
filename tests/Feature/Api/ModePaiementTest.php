<?php

namespace Tests\Feature\Api;

use App\Models\Utilisateur;
use App\Models\ModePaiement;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModePaiementTest extends TestCase
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
    public function it_gets_mode_paiements_list(): void
    {
        $modePaiements = ModePaiement::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.mode-paiements.index'));

        $response->assertOk()->assertSee($modePaiements[0]->libelle);
    }

    /**
     * @test
     */
    public function it_stores_the_mode_paiement(): void
    {
        $data = ModePaiement::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.mode-paiements.store'), $data);

        unset($data['is_confirm']);

        $this->assertDatabaseHas('mode_paiements', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_mode_paiement(): void
    {
        $modePaiement = ModePaiement::factory()->create();

        $utilisateur = Utilisateur::factory()->create();

        $data = [
            'libelle' => $this->faker->text(255),
            'numero' => $this->faker->text(255),
            'is_confirm' => $this->faker->boolean(),
            'utilisateur_id' => $utilisateur->id,
        ];

        $response = $this->putJson(
            route('api.mode-paiements.update', $modePaiement),
            $data
        );

        unset($data['is_confirm']);

        $data['id'] = $modePaiement->id;

        $this->assertDatabaseHas('mode_paiements', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_mode_paiement(): void
    {
        $modePaiement = ModePaiement::factory()->create();

        $response = $this->deleteJson(
            route('api.mode-paiements.destroy', $modePaiement)
        );

        $this->assertSoftDeleted($modePaiement);

        $response->assertNoContent();
    }
}
