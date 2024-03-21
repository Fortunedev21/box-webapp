<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\StructureFinanciere;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StructureFinanciereStoreRequest;
use App\Http\Requests\StructureFinanciereUpdateRequest;
use Inertia\Inertia;

class StructureFinanciereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', StructureFinanciere::class);

        $search = $request->get('search', '');

        $structureFinancieres = StructureFinanciere::search($search)
            ->latest('id')
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.structure_financieres.index',
            compact('structureFinancieres', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', StructureFinanciere::class);

        return view('app.structure_financieres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        StructureFinanciereStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', StructureFinanciere::class);

        $validated = $request->validated();
        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('public');
        }

        $validated['immatriculation'] = json_decode(
            $validated['immatriculation'],
            true
        );

        $validated['phone'] = json_decode($validated['phone'], true);

        $validated['cellulaire'] = json_decode($validated['cellulaire'], true);

        $validated['fax'] = json_decode($validated['fax'], true);

        $structureFinanciere = StructureFinanciere::create($validated);

        return redirect()
            ->route('structure-financieres.edit', $structureFinanciere)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        StructureFinanciere $structureFinanciere
    ): View {
        $this->authorize('view', $structureFinanciere);

        return view(
            'app.structure_financieres.show',
            compact('structureFinanciere')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        StructureFinanciere $structureFinanciere
    ): View {
        $this->authorize('update', $structureFinanciere);

        return view(
            'app.structure_financieres.edit',
            compact('structureFinanciere')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        StructureFinanciereUpdateRequest $request,
        StructureFinanciere $structureFinanciere
    ): RedirectResponse {
        $this->authorize('update', $structureFinanciere);

        $validated = $request->validated();
        if ($request->hasFile('avatar')) {
            if ($structureFinanciere->avatar) {
                Storage::delete($structureFinanciere->avatar);
            }

            $validated['avatar'] = $request->file('avatar')->store('public');
        }

        $validated['immatriculation'] = json_decode(
            $validated['immatriculation'],
            true
        );

        $validated['phone'] = json_decode($validated['phone'], true);

        $validated['cellulaire'] = json_decode($validated['cellulaire'], true);

        $validated['fax'] = json_decode($validated['fax'], true);

        $structureFinanciere->update($validated);

        return redirect()
            ->route('structure-financieres.edit', $structureFinanciere)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        StructureFinanciere $structureFinanciere
    ): RedirectResponse {
        $this->authorize('delete', $structureFinanciere);

        if ($structureFinanciere->avatar) {
            Storage::delete($structureFinanciere->avatar);
        }

        $structureFinanciere->delete();

        return redirect()
            ->route('structure-financieres.index')
            ->withSuccess(__('crud.common.removed'));
    }

    public function inscriptionStructure(Request $request)
    {
        return Inertia::render("inscriptions/inscription-structure");
    }
}
