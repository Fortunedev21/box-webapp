<?php

namespace App\Http\Controllers\Api;

use App\Models\Caisse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\CaisseResource;
use App\Http\Resources\CaisseCollection;
use App\Http\Requests\CaisseStoreRequest;
use App\Http\Requests\CaisseUpdateRequest;

class CaisseController extends Controller
{
    public function index(Request $request): CaisseCollection
    {
        $this->authorize('view-any', Caisse::class);

        $search = $request->get('search', '');

        $caisses = Caisse::search($search)
            ->latest()
            ->paginate();

        return new CaisseCollection($caisses);
    }

    public function store(CaisseStoreRequest $request): CaisseResource
    {
        $this->authorize('create', Caisse::class);

        $validated = $request->validated();

        $caisse = Caisse::create($validated);

        return new CaisseResource($caisse);
    }

    public function show(Request $request, Caisse $caisse): CaisseResource
    {
        $this->authorize('view', $caisse);

        return new CaisseResource($caisse);
    }

    public function update(
        CaisseUpdateRequest $request,
        Caisse $caisse
    ): CaisseResource {
        $this->authorize('update', $caisse);

        $validated = $request->validated();

        $caisse->update($validated);

        return new CaisseResource($caisse);
    }

    public function destroy(Request $request, Caisse $caisse): Response
    {
        $this->authorize('delete', $caisse);

        $caisse->delete();

        return response()->noContent();
    }
}
