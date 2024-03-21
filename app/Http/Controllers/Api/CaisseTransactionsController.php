<?php

namespace App\Http\Controllers\Api;

use App\Models\Caisse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionResource;
use App\Http\Resources\TransactionCollection;

class CaisseTransactionsController extends Controller
{
    public function index(
        Request $request,
        Caisse $caisse
    ): TransactionCollection {
        $this->authorize('view', $caisse);

        $search = $request->get('search', '');

        $transactions = $caisse
            ->transactions()
            ->search($search)
            ->latest()
            ->paginate();

        return new TransactionCollection($transactions);
    }

    public function store(Request $request, Caisse $caisse): TransactionResource
    {
        $this->authorize('create', Transaction::class);

        $validated = $request->validate([
            'montant' => ['required', 'numeric'],
            'identifiant_transation' => ['required', 'max:255'],
            'identifiant_paiement' => ['required', 'max:255', 'string'],
            'date_transaction' => ['required', 'date'],
            'status' => ['nullable', 'max:255', 'string'],
        ]);

        $transaction = $caisse->transactions()->create($validated);

        return new TransactionResource($transaction);
    }
}
