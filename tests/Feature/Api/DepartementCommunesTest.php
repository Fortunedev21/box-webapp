<?php

namespace Tests\Feature\Api;

use App\Models\Commune;
use App\Models\Utilisateur;
use App\Models\Departement;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DepartementCommunesTest extends TestCase
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
    public function it_gets_departement_communes(): void
    {
        $departement = Departement::factory()->create();
        $communes = Commune::factory()
            ->count(2)
            ->create([
                'departement_id' => $departement->id,
            ]);

        $response = $this->getJson(
            route('api.departements.communes.index', $departement)
        );

        $response->assertOk()->assertSee($communes[0]->nom);
    }

    /**
     * @test
     */
    public function it_stores_the_departement_communes(): void
    {
        $departement = Departement::factory()->create();
        $data = Commune::factory()
            ->make([
                'departement_id' => $departement->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.departements.communes.store', $departement),
            $data
        );

        $this->assertDatabaseHas('communes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $commune = Commune::latest('id')->first();

        $this->assertEquals($departement->id, $commune->departement_id);
    }
}
