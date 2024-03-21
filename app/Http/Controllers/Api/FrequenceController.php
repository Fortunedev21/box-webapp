<?php

namespace App\Http\Controllers\Api;

use App\Models\Frequence;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\FrequenceResource;
use App\Http\Resources\FrequenceCollection;
use App\Http\Requests\FrequenceStoreRequest;
use App\Http\Requests\FrequenceUpdateRequest;

class FrequenceController extends Controller
{
    public function index(Request $request): FrequenceCollection
    {
        $this->authorize('view-any', Frequence::class);

        $search = $request->get('search', '');

        $frequences = Frequence::search($search)
            ->latest()
            ->paginate();

        return new FrequenceCollection($frequences);
    }

    public function store(FrequenceStoreRequest $request): FrequenceResource
    {
        $this->authorize('create', Frequence::class);

        $validated = $request->validated();
        $validated['jours'] = json_decode($validated['jours'], true);

        $frequence = Frequence::create($validated);

        return new FrequenceResource($frequence);
    }

    public function show(
        Request $request,
        Frequence $frequence
    ): FrequenceResource {
        $this->authorize('view', $frequence);

        return new FrequenceResource($frequence);
    }

    public function update(
        FrequenceUpdateRequest $request,
        Frequence $frequence
    ): FrequenceResource {
        $this->authorize('update', $frequence);

        $validated = $request->validated();

        $validated['jours'] = json_decode($validated['jours'], true);

        $frequence->update($validated);

        return new FrequenceResource($frequence);
    }

    public function destroy(Request $request, Frequence $frequence): Response
    {
        $this->authorize('delete', $frequence);

        $frequence->delete();

        return response()->noContent();
    }
}
