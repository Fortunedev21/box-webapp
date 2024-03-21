<?php

namespace App\Policies;

use App\Models\TypeCaisse;
use App\Models\Utilisateur;
use Illuminate\Auth\Access\HandlesAuthorization;

class TypeCaissePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the typeCaisse can view any models.
     */
    public function viewAny(Utilisateur $utilisateur): bool
    {
        return $utilisateur->hasPermissionTo('list typecaisses');
    }

    /**
     * Determine whether the typeCaisse can view the model.
     */
    public function view(Utilisateur $utilisateur, TypeCaisse $model): bool
    {
        return $utilisateur->hasPermissionTo('view typecaisses');
    }

    /**
     * Determine whether the typeCaisse can create models.
     */
    public function create(Utilisateur $utilisateur): bool
    {
        return $utilisateur->hasPermissionTo('create typecaisses');
    }

    /**
     * Determine whether the typeCaisse can update the model.
     */
    public function update(Utilisateur $utilisateur, TypeCaisse $model): bool
    {
        return $utilisateur->hasPermissionTo('update typecaisses');
    }

    /**
     * Determine whether the typeCaisse can delete the model.
     */
    public function delete(Utilisateur $utilisateur, TypeCaisse $model): bool
    {
        return $utilisateur->hasPermissionTo('delete typecaisses');
    }

    /**
     * Determine whether the utilisateur can delete multiple instances of the model.
     */
    public function deleteAny(Utilisateur $utilisateur): bool
    {
        return $utilisateur->hasPermissionTo('delete typecaisses');
    }

    /**
     * Determine whether the typeCaisse can restore the model.
     */
    public function restore(Utilisateur $utilisateur, TypeCaisse $model): bool
    {
        return false;
    }

    /**
     * Determine whether the typeCaisse can permanently delete the model.
     */
    public function forceDelete(
        Utilisateur $utilisateur,
        TypeCaisse $model
    ): bool {
        return false;
    }
}
