<?php

namespace App\Http\Controllers\Api;

use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\DepartementResource;
use App\Http\Resources\DepartementCollection;
use App\Http\Requests\DepartementStoreRequest;
use App\Http\Requests\DepartementUpdateRequest;

class DepartementController extends Controller
{
    public function index(Request $request): DepartementCollection
    {
        $this->authorize('view-any', Departement::class);

        $search = $request->get('search', '');

        $departements = Departement::search($search)
            ->latest()
            ->paginate();

        return new DepartementCollection($departements);
    }

    public function store(DepartementStoreRequest $request): DepartementResource
    {
        $this->authorize('create', Departement::class);

        $validated = $request->validated();

        $departement = Departement::create($validated);

        return new DepartementResource($departement);
    }

    public function show(
        Request $request,
        Departement $departement
    ): DepartementResource {
        $this->authorize('view', $departement);

        return new DepartementResource($departement);
    }

    public function update(
        DepartementUpdateRequest $request,
        Departement $departement
    ): DepartementResource {
        $this->authorize('update', $departement);

        $validated = $request->validated();

        $departement->update($validated);

        return new DepartementResource($departement);
    }

    public function destroy(
        Request $request,
        Departement $departement
    ): Response {
        $this->authorize('delete', $departement);

        $departement->delete();

        return response()->noContent();
    }
}
