<?php
namespace App\Http\Controllers\Api;

use App\Models\Commune;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\StructureFinanciere;
use App\Http\Controllers\Controller;
use App\Http\Resources\StructureFinanciereCollection;

class CommuneStructureFinancieresController extends Controller
{
    public function index(
        Request $request,
        Commune $commune
    ): StructureFinanciereCollection {
        $this->authorize('view', $commune);

        $search = $request->get('search', '');

        $structureFinancieres = $commune
            ->structureFinancieres()
            ->search($search)
            ->latest()
            ->paginate();

        return new StructureFinanciereCollection($structureFinancieres);
    }

    public function store(
        Request $request,
        Commune $commune,
        StructureFinanciere $structureFinanciere
    ): Response {
        $this->authorize('update', $commune);

        $commune
            ->structureFinancieres()
            ->syncWithoutDetaching([$structureFinanciere->id]);

        return response()->noContent();
    }

    public function destroy(
        Request $request,
        Commune $commune,
        StructureFinanciere $structureFinanciere
    ): Response {
        $this->authorize('update', $commune);

        $commune->structureFinancieres()->detach($structureFinanciere);

        return response()->noContent();
    }
}
