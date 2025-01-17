<?php

namespace Tests\Feature\Api;

use App\Models\Utilisateur;
use App\Models\Transaction;

use App\Models\Caisse;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransactionTest extends TestCase
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
    public function it_gets_transactions_list(): void
    {
        $transactions = Transaction::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.transactions.index'));

        $response
            ->assertOk()
            ->assertSee($transactions[0]->identifiant_paiement);
    }

    /**
     * @test
     */
    public function it_stores_the_transaction(): void
    {
        $data = Transaction::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.transactions.store'), $data);

        $this->assertDatabaseHas('transactions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_transaction(): void
    {
        $transaction = Transaction::factory()->create();

        $caisse = Caisse::factory()->create();

        $data = [
            'montant' => $this->faker->randomNumber(2),
            'identifiant_transation' => $this->faker->uuid(),
            'identifiant_paiement' => $this->faker->text(255),
            'date_transaction' => $this->faker->dateTime(),
            'status' => $this->faker->word(),
            'caisse_id' => $caisse->id,
        ];

        $response = $this->putJson(
            route('api.transactions.update', $transaction),
            $data
        );

        $data['id'] = $transaction->id;

        $this->assertDatabaseHas('transactions', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_transaction(): void
    {
        $transaction = Transaction::factory()->create();

        $response = $this->deleteJson(
            route('api.transactions.destroy', $transaction)
        );

        $this->assertModelMissing($transaction);

        $response->assertNoContent();
    }
}
