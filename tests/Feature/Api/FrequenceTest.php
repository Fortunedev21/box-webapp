<?php

namespace Tests\Feature\Api;

use App\Models\Frequence;
use App\Models\Utilisateur;

use App\Models\Caisse;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FrequenceTest extends TestCase
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
    public function it_gets_frequences_list(): void
    {
        $frequences = Frequence::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.frequences.index'));

        $response->assertOk()->assertSee($frequences[0]->libelle);
    }

    /**
     * @test
     */
    public function it_stores_the_frequence(): void
    {
        $data = Frequence::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.frequences.store'), $data);

        $this->assertDatabaseHas('frequences', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_frequence(): void
    {
        $frequence = Frequence::factory()->create();

        $caisse = Caisse::factory()->create();

        $data = [
            'libelle' => $this->faker->text(255),
            'heure' => $this->faker->time(),
            'jours' => [],
            'caisse_id' => $caisse->id,
        ];

        $response = $this->putJson(
            route('api.frequences.update', $frequence),
            $data
        );

        $data['id'] = $frequence->id;

        $this->assertDatabaseHas('frequences', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_frequence(): void
    {
        $frequence = Frequence::factory()->create();

        $response = $this->deleteJson(
            route('api.frequences.destroy', $frequence)
        );

        $this->assertModelMissing($frequence);

        $response->assertNoContent();
    }
}
