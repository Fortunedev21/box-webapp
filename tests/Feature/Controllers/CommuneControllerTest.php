<?php

namespace Tests\Feature\Controllers;

use App\Models\Commune;
use App\Models\Utilisateur;

use App\Models\Departement;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommuneControllerTest extends TestCase
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
    public function it_displays_index_view_with_communes(): void
    {
        $communes = Commune::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('communes.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.communes.index')
            ->assertViewHas('communes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_commune(): void
    {
        $response = $this->get(route('communes.create'));

        $response->assertOk()->assertViewIs('app.communes.create');
    }

    /**
     * @test
     */
    public function it_stores_the_commune(): void
    {
        $data = Commune::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('communes.store'), $data);

        $this->assertDatabaseHas('communes', $data);

        $commune = Commune::latest('id')->first();

        $response->assertRedirect(route('communes.edit', $commune));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_commune(): void
    {
        $commune = Commune::factory()->create();

        $response = $this->get(route('communes.show', $commune));

        $response
            ->assertOk()
            ->assertViewIs('app.communes.show')
            ->assertViewHas('commune');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_commune(): void
    {
        $commune = Commune::factory()->create();

        $response = $this->get(route('communes.edit', $commune));

        $response
            ->assertOk()
            ->assertViewIs('app.communes.edit')
            ->assertViewHas('commune');
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

        $response = $this->put(route('communes.update', $commune), $data);

        $data['id'] = $commune->id;

        $this->assertDatabaseHas('communes', $data);

        $response->assertRedirect(route('communes.edit', $commune));
    }

    /**
     * @test
     */
    public function it_deletes_the_commune(): void
    {
        $commune = Commune::factory()->create();

        $response = $this->delete(route('communes.destroy', $commune));

        $response->assertRedirect(route('communes.index'));

        $this->assertModelMissing($commune);
    }
}
