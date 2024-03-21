<?php

namespace App\Http\Controllers\Api;

use App\Models\Departement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommuneResource;
use App\Http\Resources\CommuneCollection;

class DepartementCommunesController extends Controller
{
    public function index(
        Request $request,
        Departement $departement
    ): CommuneCollection {
        $this->authorize('view', $departement);

        $search = $request->get('search', '');

        $communes = $departement
            ->communes()
            ->search($search)
            ->latest()
            ->paginate();

        return new CommuneCollection($communes);
    }

    public function store(
        Request $request,
        Departement $departement
    ): CommuneResource {
        $this->authorize('create', Commune::class);

        $validated = $request->validate([
            'nom' => ['required', 'max:255', 'string'],
        ]);

        $commune = $departement->communes()->create($validated);

        return new CommuneResource($commune);
    }
}
