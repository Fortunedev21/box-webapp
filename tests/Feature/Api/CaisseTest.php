<?php

namespace Tests\Feature\Api;

use App\Models\Caisse;
use App\Models\Utilisateur;

use App\Models\TypeCaisse;
use App\Models\StructureFinanciere;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CaisseTest extends TestCase
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
    public function it_gets_caisses_list(): void
    {
        $caisses = Caisse::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.caisses.index'));

        $response->assertOk()->assertSee($caisses[0]->intitule);
    }

    /**
     * @test
     */
    public function it_stores_the_caisse(): void
    {
        $data = Caisse::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.caisses.store'), $data);

        $this->assertDatabaseHas('caisses', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_caisse(): void
    {
        $caisse = Caisse::factory()->create();

        $utilisateur = Utilisateur::factory()->create();
        $typeCaisse = TypeCaisse::factory()->create();
        $structureFinanciere = StructureFinanciere::factory()->create();

        $data = [
            'identifiant' => $this->faker->uuid(),
            'intitule' => $this->faker->text(255),
            'date_debut' => $this->faker->dateTime(),
            'date_echeance' => $this->faker->dateTime(),
            'solde_actuel' => $this->faker->randomNumber(2),
            'status' => $this->faker->word(),
            'utilisateur_id' => $utilisateur->id,
            'type_caisse_id' => $typeCaisse->id,
            'structure_financiere_id' => $structureFinanciere->id,
        ];

        $response = $this->putJson(route('api.caisses.update', $caisse), $data);

        $data['id'] = $caisse->id;

        $this->assertDatabaseHas('caisses', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_caisse(): void
    {
        $caisse = Caisse::factory()->create();

        $response = $this->deleteJson(route('api.caisses.destroy', $caisse));

        $this->assertSoftDeleted($caisse);

        $response->assertNoContent();
    }
}
