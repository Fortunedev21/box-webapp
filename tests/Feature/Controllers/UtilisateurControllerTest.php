<?php

namespace Tests\Feature\Controllers;

use App\Models\Utilisateur;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UtilisateurControllerTest extends TestCase
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
    public function it_displays_index_view_with_utilisateurs(): void
    {
        $utilisateurs = Utilisateur::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('utilisateurs.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.utilisateurs.index')
            ->assertViewHas('utilisateurs');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_utilisateur(): void
    {
        $response = $this->get(route('utilisateurs.create'));

        $response->assertOk()->assertViewIs('app.utilisateurs.create');
    }

    /**
     * @test
     */
    public function it_stores_the_utilisateur(): void
    {
        $data = Utilisateur::factory()
            ->make()
            ->toArray();
        $data['password'] = \Str::random('8');

        $data['preference'] = json_encode($data['preference']);

        $response = $this->post(route('utilisateurs.store'), $data);

        unset($data['password']);
        unset($data['email_verified_at']);
        unset($data['agence']);

        $data['preference'] = $this->castToJson($data['preference']);

        $this->assertDatabaseHas('utilisateurs', $data);

        $utilisateur = Utilisateur::latest('id')->first();

        $response->assertRedirect(route('utilisateurs.edit', $utilisateur));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_utilisateur(): void
    {
        $utilisateur = Utilisateur::factory()->create();

        $response = $this->get(route('utilisateurs.show', $utilisateur));

        $response
            ->assertOk()
            ->assertViewIs('app.utilisateurs.show')
            ->assertViewHas('utilisateur');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_utilisateur(): void
    {
        $utilisateur = Utilisateur::factory()->create();

        $response = $this->get(route('utilisateurs.edit', $utilisateur));

        $response
            ->assertOk()
            ->assertViewIs('app.utilisateurs.edit')
            ->assertViewHas('utilisateur');
    }

    /**
     * @test
     */
    public function it_updates_the_utilisateur(): void
    {
        $utilisateur = Utilisateur::factory()->create();

        $data = [
            'nom' => $this->faker->name(),
            'prenom' => $this->faker->text(255),
            'email' => $this->faker->unique->email(),
            'lieu_naissance' => $this->faker->text(255),
            'profession' => $this->faker->text(255),
            'identifiant_perso' => $this->faker->text(255),
            'sexe' => $this->faker->text(255),
            'ville_residence' => $this->faker->text(255),
            'code_parainage' => $this->faker->text(255),
            'preference' => [],
            'piece_identite' => $this->faker->text(255),
            'cni' => $this->faker->text(255),
            'numero_imatriculation' => $this->faker->text(255),
            'agence' => [],
        ];

        $data['password'] = \Str::random('8');

        $data['preference'] = json_encode($data['preference']);

        $response = $this->put(
            route('utilisateurs.update', $utilisateur),
            $data
        );

        unset($data['password']);
        unset($data['email_verified_at']);
        unset($data['agence']);

        $data['id'] = $utilisateur->id;

        $data['preference'] = $this->castToJson($data['preference']);

        $this->assertDatabaseHas('utilisateurs', $data);

        $response->assertRedirect(route('utilisateurs.edit', $utilisateur));
    }

    /**
     * @test
     */
    public function it_deletes_the_utilisateur(): void
    {
        $utilisateur = Utilisateur::factory()->create();

        $response = $this->delete(route('utilisateurs.destroy', $utilisateur));

        $response->assertRedirect(route('utilisateurs.index'));

        $this->assertSoftDeleted($utilisateur);
    }
}
