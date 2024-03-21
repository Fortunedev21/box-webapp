<?php

namespace Tests\Feature\Controllers;

use App\Models\TypeCaisse;
use App\Models\Utilisateur;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TypeCaisseControllerTest extends TestCase
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
    public function it_displays_index_view_with_type_caisses(): void
    {
        $typeCaisses = TypeCaisse::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('type-caisses.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.type_caisses.index')
            ->assertViewHas('typeCaisses');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_type_caisse(): void
    {
        $response = $this->get(route('type-caisses.create'));

        $response->assertOk()->assertViewIs('app.type_caisses.create');
    }

    /**
     * @test
     */
    public function it_stores_the_type_caisse(): void
    {
        $data = TypeCaisse::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('type-caisses.store'), $data);

        $this->assertDatabaseHas('type_caisses', $data);

        $typeCaisse = TypeCaisse::latest('id')->first();

        $response->assertRedirect(route('type-caisses.edit', $typeCaisse));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_type_caisse(): void
    {
        $typeCaisse = TypeCaisse::factory()->create();

        $response = $this->get(route('type-caisses.show', $typeCaisse));

        $response
            ->assertOk()
            ->assertViewIs('app.type_caisses.show')
            ->assertViewHas('typeCaisse');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_type_caisse(): void
    {
        $typeCaisse = TypeCaisse::factory()->create();

        $response = $this->get(route('type-caisses.edit', $typeCaisse));

        $response
            ->assertOk()
            ->assertViewIs('app.type_caisses.edit')
            ->assertViewHas('typeCaisse');
    }

    /**
     * @test
     */
    public function it_updates_the_type_caisse(): void
    {
        $typeCaisse = TypeCaisse::factory()->create();

        $data = [
            'libelle' => $this->faker->text(255),
            'slug' => $this->faker->slug(),
            'status' => $this->faker->word(),
        ];

        $response = $this->put(
            route('type-caisses.update', $typeCaisse),
            $data
        );

        $data['id'] = $typeCaisse->id;

        $this->assertDatabaseHas('type_caisses', $data);

        $response->assertRedirect(route('type-caisses.edit', $typeCaisse));
    }

    /**
     * @test
     */
    public function it_deletes_the_type_caisse(): void
    {
        $typeCaisse = TypeCaisse::factory()->create();

        $response = $this->delete(route('type-caisses.destroy', $typeCaisse));

        $response->assertRedirect(route('type-caisses.index'));

        $this->assertSoftDeleted($typeCaisse);
    }
}
