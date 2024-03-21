<?php

namespace App\Policies;

use App\Models\Frequence;
use App\Models\Utilisateur;
use Illuminate\Auth\Access\HandlesAuthorization;

class FrequencePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the frequence can view any models.
     */
    public function viewAny(Utilisateur $utilisateur): bool
    {
        return $utilisateur->hasPermissionTo('list frequences');
    }

    /**
     * Determine whether the frequence can view the model.
     */
    public function view(Utilisateur $utilisateur, Frequence $model): bool
    {
        return $utilisateur->hasPermissionTo('view frequences');
    }

    /**
     * Determine whether the frequence can create models.
     */
    public function create(Utilisateur $utilisateur): bool
    {
        return $utilisateur->hasPermissionTo('create frequences');
    }

    /**
     * Determine whether the frequence can update the model.
     */
    public function update(Utilisateur $utilisateur, Frequence $model): bool
    {
        return $utilisateur->hasPermissionTo('update frequences');
    }

    /**
     * Determine whether the frequence can delete the model.
     */
    public function delete(Utilisateur $utilisateur, Frequence $model): bool
    {
        return $utilisateur->hasPermissionTo('delete frequences');
    }

    /**
     * Determine whether the utilisateur can delete multiple instances of the model.
     */
    public function deleteAny(Utilisateur $utilisateur): bool
    {
        return $utilisateur->hasPermissionTo('delete frequences');
    }

    /**
     * Determine whether the frequence can restore the model.
     */
    public function restore(Utilisateur $utilisateur, Frequence $model): bool
    {
        return false;
    }

    /**
     * Determine whether the frequence can permanently delete the model.
     */
    public function forceDelete(
        Utilisateur $utilisateur,
        Frequence $model
    ): bool {
        return false;
    }
}
