<?php

namespace App\Http\Controllers\Api;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\UtilisateurResource;
use App\Http\Resources\UtilisateurCollection;
use App\Http\Requests\UtilisateurStoreRequest;
use App\Http\Requests\UtilisateurUpdateRequest;

class UtilisateurController extends Controller
{
    public function index(Request $request): UtilisateurCollection
    {
        // $this->authorize('view-any', Utilisateur::class);

        $search = $request->get('search', '');

        $utilisateurs = Utilisateur::search($search)
            ->latest()
            ->paginate();

        return new UtilisateurCollection($utilisateurs);
    }

    public function store(UtilisateurStoreRequest $request): UtilisateurResource
    {
        $this->authorize('create', Utilisateur::class);

        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('public');
        }

        $validated['preference'] = json_decode($validated['preference'], true);

        $utilisateur = Utilisateur::create($validated);

        $utilisateur->syncRoles($request->roles);

        return new UtilisateurResource($utilisateur);
    }

    public function show(
        Request $request,
        Utilisateur $utilisateur
    ): UtilisateurResource {
       // $this->authorize('view', $utilisateur);

        return new UtilisateurResource($utilisateur);
    }

    public function update(
        UtilisateurUpdateRequest $request,
        Utilisateur $utilisateur
    ): UtilisateurResource {
        $this->authorize('update', $utilisateur);

        $validated = $request->validated();

        if (empty($validated['password'])) {
            unset($validated['password']);
        } else {
            $validated['password'] = Hash::make($validated['password']);
        }

        if ($request->hasFile('avatar')) {
            if ($utilisateur->avatar) {
                Storage::delete($utilisateur->avatar);
            }

            $validated['avatar'] = $request->file('avatar')->store('public');
        }

        $validated['preference'] = json_decode($validated['preference'], true);

        $utilisateur->update($validated);

        $utilisateur->syncRoles($request->roles);

        return new UtilisateurResource($utilisateur);
    }

    public function destroy(
        Request $request,
        Utilisateur $utilisateur
    ): Response {
        $this->authorize('delete', $utilisateur);

        if ($utilisateur->avatar) {
            Storage::delete($utilisateur->avatar);
        }

        $utilisateur->delete();

        return response()->noContent();
    }
}
