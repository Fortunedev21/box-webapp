<?php

namespace App\Policies;

use App\Models\Departement;
use App\Models\Utilisateur;
use Illuminate\Auth\Access\HandlesAuthorization;

class DepartementPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the departement can view any models.
     */
    public function viewAny(Utilisateur $utilisateur): bool
    {
        return $utilisateur->hasPermissionTo('list departements');
    }

    /**
     * Determine whether the departement can view the model.
     */
    public function view(Utilisateur $utilisateur, Departement $model): bool
    {
        return $utilisateur->hasPermissionTo('view departements');
    }

    /**
     * Determine whether the departement can create models.
     */
    public function create(Utilisateur $utilisateur): bool
    {
        return $utilisateur->hasPermissionTo('create departements');
    }

    /**
     * Determine whether the departement can update the model.
     */
    public function update(Utilisateur $utilisateur, Departement $model): bool
    {
        return $utilisateur->hasPermissionTo('update departements');
    }

    /**
     * Determine whether the departement can delete the model.
     */
    public function delete(Utilisateur $utilisateur, Departement $model): bool
    {
        return $utilisateur->hasPermissionTo('delete departements');
    }

    /**
     * Determine whether the utilisateur can delete multiple instances of the model.
     */
    public function deleteAny(Utilisateur $utilisateur): bool
    {
        return $utilisateur->hasPermissionTo('delete departements');
    }

    /**
     * Determine whether the departement can restore the model.
     */
    public function restore(Utilisateur $utilisateur, Departement $model): bool
    {
        return false;
    }

    /**
     * Determine whether the departement can permanently delete the model.
     */
    public function forceDelete(
        Utilisateur $utilisateur,
        Departement $model
    ): bool {
        return false;
    }
}
