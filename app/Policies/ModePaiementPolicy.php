<?php

namespace App\Policies;

use App\Models\Utilisateur;
use App\Models\ModePaiement;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModePaiementPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the modePaiement can view any models.
     */
    public function viewAny(Utilisateur $utilisateur): bool
    {
        return $utilisateur->hasPermissionTo('list modepaiements');
    }

    /**
     * Determine whether the modePaiement can view the model.
     */
    public function view(Utilisateur $utilisateur, ModePaiement $model): bool
    {
        return $utilisateur->hasPermissionTo('view modepaiements');
    }

    /**
     * Determine whether the modePaiement can create models.
     */
    public function create(Utilisateur $utilisateur): bool
    {
        return $utilisateur->hasPermissionTo('create modepaiements');
    }

    /**
     * Determine whether the modePaiement can update the model.
     */
    public function update(Utilisateur $utilisateur, ModePaiement $model): bool
    {
        return $utilisateur->hasPermissionTo('update modepaiements');
    }

    /**
     * Determine whether the modePaiement can delete the model.
     */
    public function delete(Utilisateur $utilisateur, ModePaiement $model): bool
    {
        return $utilisateur->hasPermissionTo('delete modepaiements');
    }

    /**
     * Determine whether the utilisateur can delete multiple instances of the model.
     */
    public function deleteAny(Utilisateur $utilisateur): bool
    {
        return $utilisateur->hasPermissionTo('delete modepaiements');
    }

    /**
     * Determine whether the modePaiement can restore the model.
     */
    public function restore(Utilisateur $utilisateur, ModePaiement $model): bool
    {
        return false;
    }

    /**
     * Determine whether the modePaiement can permanently delete the model.
     */
    public function forceDelete(
        Utilisateur $utilisateur,
        ModePaiement $model
    ): bool {
        return false;
    }
}
