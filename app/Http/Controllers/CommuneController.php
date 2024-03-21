<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use Illuminate\View\View;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CommuneStoreRequest;
use App\Http\Requests\CommuneUpdateRequest;

class CommuneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Commune::class);

        $search = $request->get('search', '');

        $communes = Commune::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.communes.index', compact('communes', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Commune::class);

        $departements = Departement::pluck('nom', 'id');

        return view('app.communes.create', compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommuneStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Commune::class);

        $validated = $request->validated();

        $commune = Commune::create($validated);

        return redirect()
            ->route('communes.edit', $commune)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Commune $commune): View
    {
        $this->authorize('view', $commune);

        return view('app.communes.show', compact('commune'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Commune $commune): View
    {
        $this->authorize('update', $commune);

        $departements = Departement::pluck('nom', 'id');

        return view('app.communes.edit', compact('commune', 'departements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        CommuneUpdateRequest $request,
        Commune $commune
    ): RedirectResponse {
        $this->authorize('update', $commune);

        $validated = $request->validated();

        $commune->update($validated);

        return redirect()
            ->route('communes.edit', $commune)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Commune $commune
    ): RedirectResponse {
        $this->authorize('delete', $commune);

        $commune->delete();

        return redirect()
            ->route('communes.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
