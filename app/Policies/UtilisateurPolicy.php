<?php

namespace App\Policies;

use App\Models\Utilisateur;
use Illuminate\Auth\Access\HandlesAuthorization;

class UtilisateurPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the utilisateur can view any models.
     */
    public function viewAny(Utilisateur $utilisateur): bool
    {
        return $utilisateur->hasPermissionTo('list utilisateurs');
    }

    /**
     * Determine whether the utilisateur can view the model.
     */
    public function view(Utilisateur $utilisateur, Utilisateur $model): bool
    {
        return $utilisateur->hasPermissionTo('view utilisateurs');
    }

    /**
     * Determine whether the utilisateur can create models.
     */
    public function create(Utilisateur $utilisateur): bool
    {
        return $utilisateur->hasPermissionTo('create utilisateurs');
    }

    /**
     * Determine whether the utilisateur can update the model.
     */
    public function update(Utilisateur $utilisateur, Utilisateur $model): bool
    {
        return $utilisateur->hasPermissionTo('update utilisateurs');
    }

    /**
     * Determine whether the utilisateur can delete the model.
     */
    public function delete(Utilisateur $utilisateur, Utilisateur $model): bool
    {
        return $utilisateur->hasPermissionTo('delete utilisateurs');
    }

    /**
     * Determine whether the utilisateur can delete multiple instances of the model.
     */
    public function deleteAny(Utilisateur $utilisateur): bool
    {
        return $utilisateur->hasPermissionTo('delete utilisateurs');
    }

    /**
     * Determine whether the utilisateur can restore the model.
     */
    public function restore(Utilisateur $utilisateur, Utilisateur $model): bool
    {
        return false;
    }

    /**
     * Determine whether the utilisateur can permanently delete the model.
     */
    public function forceDelete(
        Utilisateur $utilisateur,
        Utilisateur $model
    ): bool {
        return false;
    }
}
