<?php

namespace App\Http\Controllers\Api;

use App\Models\ModePaiement;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\ModePaiementResource;
use App\Http\Resources\ModePaiementCollection;
use App\Http\Requests\ModePaiementStoreRequest;
use App\Http\Requests\ModePaiementUpdateRequest;

class ModePaiementController extends Controller
{
    public function index(Request $request): ModePaiementCollection
    {
        $this->authorize('view-any', ModePaiement::class);

        $search = $request->get('search', '');

        $modePaiements = ModePaiement::search($search)
            ->latest()
            ->paginate();

        return new ModePaiementCollection($modePaiements);
    }

    public function store(
        ModePaiementStoreRequest $request
    ): ModePaiementResource {
        $this->authorize('create', ModePaiement::class);

        $validated = $request->validated();

        $modePaiement = ModePaiement::create($validated);

        return new ModePaiementResource($modePaiement);
    }

    public function show(
        Request $request,
        ModePaiement $modePaiement
    ): ModePaiementResource {
        $this->authorize('view', $modePaiement);

        return new ModePaiementResource($modePaiement);
    }

    public function update(
        ModePaiementUpdateRequest $request,
        ModePaiement $modePaiement
    ): ModePaiementResource {
        $this->authorize('update', $modePaiement);

        $validated = $request->validated();

        $modePaiement->update($validated);

        return new ModePaiementResource($modePaiement);
    }

    public function destroy(
        Request $request,
        ModePaiement $modePaiement
    ): Response {
        $this->authorize('delete', $modePaiement);

        $modePaiement->delete();

        return response()->noContent();
    }
}
