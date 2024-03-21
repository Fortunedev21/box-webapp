<?php

namespace App\Http\Controllers\Api;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ModePaiementResource;
use App\Http\Resources\ModePaiementCollection;

class UtilisateurModePaiementsController extends Controller
{
    public function index(
        Request $request,
        Utilisateur $utilisateur
    ): ModePaiementCollection {
        $this->authorize('view', $utilisateur);

        $search = $request->get('search', '');

        $modePaiements = $utilisateur
            ->modePaiements()
            ->search($search)
            ->latest()
            ->paginate();

        return new ModePaiementCollection($modePaiements);
    }

    public function store(
        Request $request,
        Utilisateur $utilisateur
    ): ModePaiementResource {
        $this->authorize('create', ModePaiement::class);

        $validated = $request->validate([
            'libelle' => ['required', 'max:255', 'string'],
            'numero' => ['required', 'max:255', 'string'],
        ]);

        $modePaiement = $utilisateur->modePaiements()->create($validated);

        return new ModePaiementResource($modePaiement);
    }
}
