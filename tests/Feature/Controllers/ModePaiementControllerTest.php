<?php

namespace Tests\Feature\Controllers;

use App\Models\Utilisateur;
use App\Models\ModePaiement;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModePaiementControllerTest extends TestCase
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
    public function it_displays_index_view_with_mode_paiements(): void
    {
        $modePaiements = ModePaiement::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('mode-paiements.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.mode_paiements.index')
            ->assertViewHas('modePaiements');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_mode_paiement(): void
    {
        $response = $this->get(route('mode-paiements.create'));

        $response->assertOk()->assertViewIs('app.mode_paiements.create');
    }

    /**
     * @test
     */
    public function it_stores_the_mode_paiement(): void
    {
        $data = ModePaiement::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('mode-paiements.store'), $data);

        unset($data['is_confirm']);

        $this->assertDatabaseHas('mode_paiements', $data);

        $modePaiement = ModePaiement::latest('id')->first();

        $response->assertRedirect(route('mode-paiements.edit', $modePaiement));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_mode_paiement(): void
    {
        $modePaiement = ModePaiement::factory()->create();

        $response = $this->get(route('mode-paiements.show', $modePaiement));

        $response
            ->assertOk()
            ->assertViewIs('app.mode_paiements.show')
            ->assertViewHas('modePaiement');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_mode_paiement(): void
    {
        $modePaiement = ModePaiement::factory()->create();

        $response = $this->get(route('mode-paiements.edit', $modePaiement));

        $response
            ->assertOk()
            ->assertViewIs('app.mode_paiements.edit')
            ->assertViewHas('modePaiement');
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

        $response = $this->put(
            route('mode-paiements.update', $modePaiement),
            $data
        );

        unset($data['is_confirm']);

        $data['id'] = $modePaiement->id;

        $this->assertDatabaseHas('mode_paiements', $data);

        $response->assertRedirect(route('mode-paiements.edit', $modePaiement));
    }

    /**
     * @test
     */
    public function it_deletes_the_mode_paiement(): void
    {
        $modePaiement = ModePaiement::factory()->create();

        $response = $this->delete(
            route('mode-paiements.destroy', $modePaiement)
        );

        $response->assertRedirect(route('mode-paiements.index'));

        $this->assertSoftDeleted($modePaiement);
    }
}
