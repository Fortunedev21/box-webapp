<?php

namespace App\Policies;

use App\Models\Caisse;
use App\Models\Utilisateur;
use Illuminate\Auth\Access\HandlesAuthorization;

class CaissePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the caisse can view any models.
     */
    public function viewAny(Utilisateur $utilisateur): bool
    {
        return $utilisateur->hasPermissionTo('list caisses');
    }

    /**
     * Determine whether the caisse can view the model.
     */
    public function view(Utilisateur $utilisateur, Caisse $model): bool
    {
        return $utilisateur->hasPermissionTo('view caisses');
    }

    /**
     * Determine whether the caisse can create models.
     */
    public function create(Utilisateur $utilisateur): bool
    {
        return $utilisateur->hasPermissionTo('create caisses');
    }

    /**
     * Determine whether the caisse can update the model.
     */
    public function update(Utilisateur $utilisateur, Caisse $model): bool
    {
        return $utilisateur->hasPermissionTo('update caisses');
    }

    /**
     * Determine whether the caisse can delete the model.
     */
    public function delete(Utilisateur $utilisateur, Caisse $model): bool
    {
        return $utilisateur->hasPermissionTo('delete caisses');
    }

    /**
     * Determine whether the utilisateur can delete multiple instances of the model.
     */
    public function deleteAny(Utilisateur $utilisateur): bool
    {
        return $utilisateur->hasPermissionTo('delete caisses');
    }

    /**
     * Determine whether the caisse can restore the model.
     */
    public function restore(Utilisateur $utilisateur, Caisse $model): bool
    {
        return false;
    }

    /**
     * Determine whether the caisse can permanently delete the model.
     */
    public function forceDelete(Utilisateur $utilisateur, Caisse $model): bool
    {
        return false;
    }
}
