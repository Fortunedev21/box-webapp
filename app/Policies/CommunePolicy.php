<?php

namespace App\Policies;

use App\Models\Commune;
use App\Models\Utilisateur;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommunePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the commune can view any models.
     */
    public function viewAny(Utilisateur $utilisateur): bool
    {
        return $utilisateur->hasPermissionTo('list communes');
    }

    /**
     * Determine whether the commune can view the model.
     */
    public function view(Utilisateur $utilisateur, Commune $model): bool
    {
        return $utilisateur->hasPermissionTo('view communes');
    }

    /**
     * Determine whether the commune can create models.
     */
    public function create(Utilisateur $utilisateur): bool
    {
        return $utilisateur->hasPermissionTo('create communes');
    }

    /**
     * Determine whether the commune can update the model.
     */
    public function update(Utilisateur $utilisateur, Commune $model): bool
    {
        return $utilisateur->hasPermissionTo('update communes');
    }

    /**
     * Determine whether the commune can delete the model.
     */
    public function delete(Utilisateur $utilisateur, Commune $model): bool
    {
        return $utilisateur->hasPermissionTo('delete communes');
    }

    /**
     * Determine whether the utilisateur can delete multiple instances of the model.
     */
    public function deleteAny(Utilisateur $utilisateur): bool
    {
        return $utilisateur->hasPermissionTo('delete communes');
    }

    /**
     * Determine whether the commune can restore the model.
     */
    public function restore(Utilisateur $utilisateur, Commune $model): bool
    {
        return false;
    }

    /**
     * Determine whether the commune can permanently delete the model.
     */
    public function forceDelete(Utilisateur $utilisateur, Commune $model): bool
    {
        return false;
    }
}
