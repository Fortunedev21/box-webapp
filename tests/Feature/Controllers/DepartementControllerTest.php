<?php

namespace Tests\Feature\Controllers;

use App\Models\Utilisateur;
use App\Models\Departement;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DepartementControllerTest extends TestCase
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
    public function it_displays_index_view_with_departements(): void
    {
        $departements = Departement::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('departements.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.departements.index')
            ->assertViewHas('departements');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_departement(): void
    {
        $response = $this->get(route('departements.create'));

        $response->assertOk()->assertViewIs('app.departements.create');
    }

    /**
     * @test
     */
    public function it_stores_the_departement(): void
    {
        $data = Departement::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('departements.store'), $data);

        $this->assertDatabaseHas('departements', $data);

        $departement = Departement::latest('id')->first();

        $response->assertRedirect(route('departements.edit', $departement));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_departement(): void
    {
        $departement = Departement::factory()->create();

        $response = $this->get(route('departements.show', $departement));

        $response
            ->assertOk()
            ->assertViewIs('app.departements.show')
            ->assertViewHas('departement');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_departement(): void
    {
        $departement = Departement::factory()->create();

        $response = $this->get(route('departements.edit', $departement));

        $response
            ->assertOk()
            ->assertViewIs('app.departements.edit')
            ->assertViewHas('departement');
    }

    /**
     * @test
     */
    public function it_updates_the_departement(): void
    {
        $departement = Departement::factory()->create();

        $data = [
            'nom' => $this->faker->text(255),
        ];

        $response = $this->put(
            route('departements.update', $departement),
            $data
        );

        $data['id'] = $departement->id;

        $this->assertDatabaseHas('departements', $data);

        $response->assertRedirect(route('departements.edit', $departement));
    }

    /**
     * @test
     */
    public function it_deletes_the_departement(): void
    {
        $departement = Departement::factory()->create();

        $response = $this->delete(route('departements.destroy', $departement));

        $response->assertRedirect(route('departements.index'));

        $this->assertModelMissing($departement);
    }
}
