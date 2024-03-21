<?php

namespace App\Http\Controllers;

use App\Models\Caisse;
use App\Models\Frequence;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\FrequenceStoreRequest;
use App\Http\Requests\FrequenceUpdateRequest;

class FrequenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Frequence::class);

        $search = $request->get('search', '');

        $frequences = Frequence::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.frequences.index', compact('frequences', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Frequence::class);

        $caisses = Caisse::pluck('intitule', 'id');

        return view('app.frequences.create', compact('caisses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FrequenceStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Frequence::class);

        $validated = $request->validated();
        $validated['jours'] = json_decode($validated['jours'], true);

        $frequence = Frequence::create($validated);

        return redirect()
            ->route('frequences.edit', $frequence)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Frequence $frequence): View
    {
        $this->authorize('view', $frequence);

        return view('app.frequences.show', compact('frequence'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Frequence $frequence): View
    {
        $this->authorize('update', $frequence);

        $caisses = Caisse::pluck('intitule', 'id');

        return view('app.frequences.edit', compact('frequence', 'caisses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        FrequenceUpdateRequest $request,
        Frequence $frequence
    ): RedirectResponse {
        $this->authorize('update', $frequence);

        $validated = $request->validated();
        $validated['jours'] = json_decode($validated['jours'], true);

        $frequence->update($validated);

        return redirect()
            ->route('frequences.edit', $frequence)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Frequence $frequence
    ): RedirectResponse {
        $this->authorize('delete', $frequence);

        $frequence->delete();

        return redirect()
            ->route('frequences.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
