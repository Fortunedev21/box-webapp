<?php

namespace Tests\Feature\Controllers;

use App\Models\Frequence;
use App\Models\Utilisateur;

use App\Models\Caisse;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FrequenceControllerTest extends TestCase
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
    public function it_displays_index_view_with_frequences(): void
    {
        $frequences = Frequence::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('frequences.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.frequences.index')
            ->assertViewHas('frequences');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_frequence(): void
    {
        $response = $this->get(route('frequences.create'));

        $response->assertOk()->assertViewIs('app.frequences.create');
    }

    /**
     * @test
     */
    public function it_stores_the_frequence(): void
    {
        $data = Frequence::factory()
            ->make()
            ->toArray();

        $data['jours'] = json_encode($data['jours']);

        $response = $this->post(route('frequences.store'), $data);

        $data['jours'] = $this->castToJson($data['jours']);

        $this->assertDatabaseHas('frequences', $data);

        $frequence = Frequence::latest('id')->first();

        $response->assertRedirect(route('frequences.edit', $frequence));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_frequence(): void
    {
        $frequence = Frequence::factory()->create();

        $response = $this->get(route('frequences.show', $frequence));

        $response
            ->assertOk()
            ->assertViewIs('app.frequences.show')
            ->assertViewHas('frequence');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_frequence(): void
    {
        $frequence = Frequence::factory()->create();

        $response = $this->get(route('frequences.edit', $frequence));

        $response
            ->assertOk()
            ->assertViewIs('app.frequences.edit')
            ->assertViewHas('frequence');
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

        $data['jours'] = json_encode($data['jours']);

        $response = $this->put(route('frequences.update', $frequence), $data);

        $data['id'] = $frequence->id;

        $data['jours'] = $this->castToJson($data['jours']);

        $this->assertDatabaseHas('frequences', $data);

        $response->assertRedirect(route('frequences.edit', $frequence));
    }

    /**
     * @test
     */
    public function it_deletes_the_frequence(): void
    {
        $frequence = Frequence::factory()->create();

        $response = $this->delete(route('frequences.destroy', $frequence));

        $response->assertRedirect(route('frequences.index'));

        $this->assertModelMissing($frequence);
    }
}
