<?php

namespace Tests\Feature\Api;

use App\Models\Commune;
use App\Models\Utilisateur;
use App\Models\StructureFinanciere;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommuneStructureFinancieresTest extends TestCase
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
    public function it_gets_commune_structure_financieres(): void
    {
        $commune = Commune::factory()->create();
        $structureFinanciere = StructureFinanciere::factory()->create();

        $commune->structureFinancieres()->attach($structureFinanciere);

        $response = $this->getJson(
            route('api.communes.structure-financieres.index', $commune)
        );

        $response->assertOk()->assertSee($structureFinanciere->denomination);
    }

    /**
     * @test
     */
    public function it_can_attach_structure_financieres_to_commune(): void
    {
        $commune = Commune::factory()->create();
        $structureFinanciere = StructureFinanciere::factory()->create();

        $response = $this->postJson(
            route('api.communes.structure-financieres.store', [
                $commune,
                $structureFinanciere,
            ])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $commune
                ->structureFinancieres()
                ->where('structure_financieres.id', $structureFinanciere->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_structure_financieres_from_commune(): void
    {
        $commune = Commune::factory()->create();
        $structureFinanciere = StructureFinanciere::factory()->create();

        $response = $this->deleteJson(
            route('api.communes.structure-financieres.store', [
                $commune,
                $structureFinanciere,
            ])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $commune
                ->structureFinancieres()
                ->where('structure_financieres.id', $structureFinanciere->id)
                ->exists()
        );
    }
}
