<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\TypeCaisse;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TypeCaisseStoreRequest;
use App\Http\Requests\TypeCaisseUpdateRequest;

class TypeCaisseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', TypeCaisse::class);

        $search = $request->get('search', '');

        $typeCaisses = TypeCaisse::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.type_caisses.index', compact('typeCaisses', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', TypeCaisse::class);

        return view('app.type_caisses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeCaisseStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', TypeCaisse::class);

        $validated = $request->validated();

        $typeCaisse = TypeCaisse::create($validated);

        return redirect()
            ->route('type-caisses.edit', $typeCaisse)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, TypeCaisse $typeCaisse): View
    {
        $this->authorize('view', $typeCaisse);

        return view('app.type_caisses.show', compact('typeCaisse'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, TypeCaisse $typeCaisse): View
    {
        $this->authorize('update', $typeCaisse);

        return view('app.type_caisses.edit', compact('typeCaisse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        TypeCaisseUpdateRequest $request,
        TypeCaisse $typeCaisse
    ): RedirectResponse {
        $this->authorize('update', $typeCaisse);

        $validated = $request->validated();

        $typeCaisse->update($validated);

        return redirect()
            ->route('type-caisses.edit', $typeCaisse)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        TypeCaisse $typeCaisse
    ): RedirectResponse {
        $this->authorize('delete', $typeCaisse);

        $typeCaisse->delete();

        return redirect()
            ->route('type-caisses.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
