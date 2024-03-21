<?php

namespace App\Http\Controllers;

use App\Models\Caisse;
use Illuminate\View\View;
use App\Models\TypeCaisse;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Models\StructureFinanciere;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CaisseStoreRequest;
use App\Http\Requests\CaisseUpdateRequest;

class CaisseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Caisse::class);

        $search = $request->get('search', '');

        $caisses = Caisse::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.caisses.index', compact('caisses', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Caisse::class);

        $utilisateurs = Utilisateur::pluck('nom', 'id');
        $typeCaisses = TypeCaisse::pluck('libelle', 'id');
        $structureFinancieres = StructureFinanciere::pluck(
            'denomination',
            'id'
        );

        return view(
            'app.caisses.create',
            compact('utilisateurs', 'typeCaisses', 'structureFinancieres')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CaisseStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Caisse::class);

        $validated = $request->validated();

        $caisse = Caisse::create($validated);

        return redirect()
            ->route('caisses.edit', $caisse)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Caisse $caisse): View
    {
        $this->authorize('view', $caisse);

        return view('app.caisses.show', compact('caisse'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Caisse $caisse): View
    {
        $this->authorize('update', $caisse);

        $utilisateurs = Utilisateur::pluck('nom', 'id');
        $typeCaisses = TypeCaisse::pluck('libelle', 'id');
        $structureFinancieres = StructureFinanciere::pluck(
            'denomination',
            'id'
        );

        return view(
            'app.caisses.edit',
            compact(
                'caisse',
                'utilisateurs',
                'typeCaisses',
                'structureFinancieres'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        CaisseUpdateRequest $request,
        Caisse $caisse
    ): RedirectResponse {
        $this->authorize('update', $caisse);

        $validated = $request->validated();

        $caisse->update($validated);

        return redirect()
            ->route('caisses.edit', $caisse)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Caisse $caisse): RedirectResponse
    {
        $this->authorize('delete', $caisse);

        $caisse->delete();

        return redirect()
            ->route('caisses.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
