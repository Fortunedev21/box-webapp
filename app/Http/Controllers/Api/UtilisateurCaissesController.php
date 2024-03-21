<?php

namespace App\Http\Controllers\Api;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CaisseResource;
use App\Http\Resources\CaisseCollection;

class UtilisateurCaissesController extends Controller
{
    public function index(
        Request $request,
        Utilisateur $utilisateur
    ): CaisseCollection {
       //  $this->authorize('view', $utilisateur);

        $search = $request->get('search', '');

        $caisses = $utilisateur
            ->caisses()
            ->search($search)
            ->latest()
            ->paginate();

        return new CaisseCollection($caisses);
    }

    public function store(
        Request $request,
        Utilisateur $utilisateur
    ): CaisseResource {
        $this->authorize('create', Caisse::class);

        $validated = $request->validate([
            'identifiant' => ['required', 'max:255'],
            'intitule' => ['required', 'max:255', 'string'],
            'date_debut' => ['required', 'date'],
            'date_echeance' => ['nullable', 'date'],
            'solde_actuel' => ['required', 'numeric'],
            'status' => ['nullable', 'max:255', 'string'],
            'type_caisse_id' => ['required', 'exists:type_caisses,id'],
            'structure_financiere_id' => [
                'required',
                'exists:structure_financieres,id',
            ],
        ]);

        $caisse = $utilisateur->caisses()->create($validated);

        return new CaisseResource($caisse);
    }
}
