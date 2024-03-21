<?php

namespace App\Http\Controllers\Api;

use App\Models\Commune;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommuneResource;
use App\Http\Resources\CommuneCollection;
use App\Http\Requests\CommuneStoreRequest;
use App\Http\Requests\CommuneUpdateRequest;

class CommuneController extends Controller
{
    public function index(Request $request): CommuneCollection
    {
        $this->authorize('view-any', Commune::class);

        $search = $request->get('search', '');

        $communes = Commune::search($search)
            ->latest()
            ->paginate();

        return new CommuneCollection($communes);
    }

    public function store(CommuneStoreRequest $request): CommuneResource
    {
        $this->authorize('create', Commune::class);

        $validated = $request->validated();

        $commune = Commune::create($validated);

        return new CommuneResource($commune);
    }

    public function show(Request $request, Commune $commune): CommuneResource
    {
        $this->authorize('view', $commune);

        return new CommuneResource($commune);
    }

    public function update(
        CommuneUpdateRequest $request,
        Commune $commune
    ): CommuneResource {
        $this->authorize('update', $commune);

        $validated = $request->validated();

        $commune->update($validated);

        return new CommuneResource($commune);
    }

    public function destroy(Request $request, Commune $commune): Response
    {
        $this->authorize('delete', $commune);

        $commune->delete();

        return response()->noContent();
    }
}
