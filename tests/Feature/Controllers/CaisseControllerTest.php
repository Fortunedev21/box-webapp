<?php

namespace Tests\Feature\Controllers;

use App\Models\Caisse;
use App\Models\Utilisateur;

use App\Models\TypeCaisse;
use App\Models\StructureFinanciere;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CaisseControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            Utilisateur::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_caisses(): void
    {
        $caisses = Caisse::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('caisses.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.caisses.index')
            ->assertViewHas('caisses');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_caisse(): void
    {
        $response = $this->get(route('caisses.create'));

        $response->assertOk()->assertViewIs('app.caisses.create');
    }

    /**
     * @test
     */
    public function it_stores_the_caisse(): void
    {
        $data = Caisse::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('caisses.store'), $data);

        $this->assertDatabaseHas('caisses', $data);

        $caisse = Caisse::latest('id')->first();

        $response->assertRedirect(route('caisses.edit', $caisse));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_caisse(): void
    {
        $caisse = Caisse::factory()->create();

        $response = $this->get(route('caisses.show', $caisse));

        $response
            ->assertOk()
            ->assertViewIs('app.caisses.show')
            ->assertViewHas('caisse');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_caisse(): void
    {
        $caisse = Caisse::factory()->create();

        $response = $this->get(route('caisses.edit', $caisse));

        $response
            ->assertOk()
            ->assertViewIs('app.caisses.edit')
            ->assertViewHas('caisse');
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

        $response = $this->put(route('caisses.update', $caisse), $data);

        $data['id'] = $caisse->id;

        $this->assertDatabaseHas('caisses', $data);

        $response->assertRedirect(route('caisses.edit', $caisse));
    }

    /**
     * @test
     */
    public function it_deletes_the_caisse(): void
    {
        $caisse = Caisse::factory()->create();

        $response = $this->delete(route('caisses.destroy', $caisse));

        $response->assertRedirect(route('caisses.index'));

        $this->assertSoftDeleted($caisse);
    }
}
