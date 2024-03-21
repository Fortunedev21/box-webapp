<?php

namespace Tests\Feature\Controllers;

use App\Models\Utilisateur;
use App\Models\StructureFinanciere;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StructureFinanciereControllerTest extends TestCase
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

    protected function castToJson($json)
    {
        if (is_array($json)) {
            $json = addslashes(json_encode($json));
        } elseif (is_null($json) || is_null(json_decode($json))) {
            throw new \Exception(
                'A valid JSON string was not provided for casting.'
            );
        }

        return \DB::raw("CAST('{$json}' AS JSON)");
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_structure_financieres(): void
    {
        $structureFinancieres = StructureFinanciere::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('structure-financieres.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.structure_financieres.index')
            ->assertViewHas('structureFinancieres');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_structure_financiere(): void
    {
        $response = $this->get(route('structure-financieres.create'));

        $response->assertOk()->assertViewIs('app.structure_financieres.create');
    }

    /**
     * @test
     */
    public function it_stores_the_structure_financiere(): void
    {
        $data = StructureFinanciere::factory()
            ->make()
            ->toArray();

        $data['immatriculation'] = json_encode($data['immatriculation']);
        $data['phone'] = json_encode($data['phone']);
        $data['cellulaire'] = json_encode($data['cellulaire']);
        $data['fax'] = json_encode($data['fax']);

        $response = $this->post(route('structure-financieres.store'), $data);

        $data['immatriculation'] = $this->castToJson($data['immatriculation']);
        $data['phone'] = $this->castToJson($data['phone']);
        $data['cellulaire'] = $this->castToJson($data['cellulaire']);
        $data['fax'] = $this->castToJson($data['fax']);

        $this->assertDatabaseHas('structure_financieres', $data);

        $structureFinanciere = StructureFinanciere::latest('id')->first();

        $response->assertRedirect(
            route('structure-financieres.edit', $structureFinanciere)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_structure_financiere(): void
    {
        $structureFinanciere = StructureFinanciere::factory()->create();

        $response = $this->get(
            route('structure-financieres.show', $structureFinanciere)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.structure_financieres.show')
            ->assertViewHas('structureFinanciere');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_structure_financiere(): void
    {
        $structureFinanciere = StructureFinanciere::factory()->create();

        $response = $this->get(
            route('structure-financieres.edit', $structureFinanciere)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.structure_financieres.edit')
            ->assertViewHas('structureFinanciere');
    }

    /**
     * @test
     */
    public function it_updates_the_structure_financiere(): void
    {
        $structureFinanciere = StructureFinanciere::factory()->create();

        $data = [
            'identifiant' => $this->faker->uuid(),
            'denomination' => $this->faker->text(255),
            'date_creation' => $this->faker->date(),
            'immatriculation' => [],
            'email' => $this->faker->email(),
            'siege_social' => $this->faker->text(255),
            'agrement' => $this->faker->text(255),
            'site_internet' => $this->faker->text(255),
            'statut_juridique' => $this->faker->text(255),
            'numero_inscription' => $this->faker->text(255),
            'boite_postal' => $this->faker->text(255),
            'phone' => [],
            'cellulaire' => [],
            'fax' => [],
            'taux_interet' => $this->faker->randomNumber(0),
            'delai_retrait_fond' => $this->faker->text(255),
        ];

        $data['immatriculation'] = json_encode($data['immatriculation']);
        $data['phone'] = json_encode($data['phone']);
        $data['cellulaire'] = json_encode($data['cellulaire']);
        $data['fax'] = json_encode($data['fax']);

        $response = $this->put(
            route('structure-financieres.update', $structureFinanciere),
            $data
        );

        $data['id'] = $structureFinanciere->id;

        $data['immatriculation'] = $this->castToJson($data['immatriculation']);
        $data['phone'] = $this->castToJson($data['phone']);
        $data['cellulaire'] = $this->castToJson($data['cellulaire']);
        $data['fax'] = $this->castToJson($data['fax']);

        $this->assertDatabaseHas('structure_financieres', $data);

        $response->assertRedirect(
            route('structure-financieres.edit', $structureFinanciere)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_structure_financiere(): void
    {
        $structureFinanciere = StructureFinanciere::factory()->create();

        $response = $this->delete(
            route('structure-financieres.destroy', $structureFinanciere)
        );

        $response->assertRedirect(route('structure-financieres.index'));

        $this->assertModelMissing($structureFinanciere);
    }
}
