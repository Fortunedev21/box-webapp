<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Utilisateur;
use App\Models\ModePaiement;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ModePaiementStoreRequest;
use App\Http\Requests\ModePaiementUpdateRequest;

class ModePaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', ModePaiement::class);

        $search = $request->get('search', '');

        $modePaiements = ModePaiement::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.mode_paiements.index',
            compact('modePaiements', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', ModePaiement::class);

        $utilisateurs = Utilisateur::pluck('nom', 'id');

        return view('app.mode_paiements.create', compact('utilisateurs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ModePaiementStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', ModePaiement::class);

        $validated = $request->validated();

        $modePaiement = ModePaiement::create($validated);

        return redirect()
            ->route('mode-paiements.edit', $modePaiement)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, ModePaiement $modePaiement): View
    {
        $this->authorize('view', $modePaiement);

        return view('app.mode_paiements.show', compact('modePaiement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, ModePaiement $modePaiement): View
    {
        $this->authorize('update', $modePaiement);

        $utilisateurs = Utilisateur::pluck('nom', 'id');

        return view(
            'app.mode_paiements.edit',
            compact('modePaiement', 'utilisateurs')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ModePaiementUpdateRequest $request,
        ModePaiement $modePaiement
    ): RedirectResponse {
        $this->authorize('update', $modePaiement);

        $validated = $request->validated();

        $modePaiement->update($validated);

        return redirect()
            ->route('mode-paiements.edit', $modePaiement)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        ModePaiement $modePaiement
    ): RedirectResponse {
        $this->authorize('delete', $modePaiement);

        $modePaiement->delete();

        return redirect()
            ->route('mode-paiements.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
