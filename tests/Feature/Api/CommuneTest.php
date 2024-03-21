<?php

namespace Tests\Feature\Api;

use App\Models\Commune;
use App\Models\Utilisateur;

use App\Models\Departement;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommuneTest extends TestCase
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
    public function it_gets_communes_list(): void
    {
        $communes = Commune::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.communes.index'));

        $response->assertOk()->assertSee($communes[0]->nom);
    }

    /**
     * @test
     */
    public function it_stores_the_commune(): void
    {
        $data = Commune::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.communes.store'), $data);

        $this->assertDatabaseHas('communes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_commune(): void
    {
        $commune = Commune::factory()->create();

        $departement = Departement::factory()->create();

        $data = [
            'nom' => $this->faker->text(255),
            'departement_id' => $departement->id,
        ];

        $response = $this->putJson(
            route('api.communes.update', $commune),
            $data
        );

        $data['id'] = $commune->id;

        $this->assertDatabaseHas('communes', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_commune(): void
    {
        $commune = Commune::factory()->create();

        $response = $this->deleteJson(route('api.communes.destroy', $commune));

        $this->assertModelMissing($commune);

        $response->assertNoContent();
    }
}
