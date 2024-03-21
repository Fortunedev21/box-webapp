<?php

namespace App\Policies;

use App\Models\Utilisateur;
use App\Models\StructureFinanciere;
use Illuminate\Auth\Access\HandlesAuthorization;

class StructureFinancierePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the structureFinanciere can view any models.
     */
    public function viewAny(Utilisateur $utilisateur): bool
    {
        return $utilisateur->hasPermissionTo('list structurefinancieres');
    }

    /**
     * Determine whether the structureFinanciere can view the model.
     */
    public function view(
        Utilisateur $utilisateur,
        StructureFinanciere $model
    ): bool {
        return $utilisateur->hasPermissionTo('view structurefinancieres');
    }

    /**
     * Determine whether the structureFinanciere can create models.
     */
    public function create(Utilisateur $utilisateur): bool
    {
        return $utilisateur->hasPermissionTo('create structurefinancieres');
    }

    /**
     * Determine whether the structureFinanciere can update the model.
     */
    public function update(
        Utilisateur $utilisateur,
        StructureFinanciere $model
    ): bool {
        return $utilisateur->hasPermissionTo('update structurefinancieres');
    }

    /**
     * Determine whether the structureFinanciere can delete the model.
     */
    public function delete(
        Utilisateur $utilisateur,
        StructureFinanciere $model
    ): bool {
        return $utilisateur->hasPermissionTo('delete structurefinancieres');
    }

    /**
     * Determine whether the utilisateur can delete multiple instances of the model.
     */
    public function deleteAny(Utilisateur $utilisateur): bool
    {
        return $utilisateur->hasPermissionTo('delete structurefinancieres');
    }

    /**
     * Determine whether the structureFinanciere can restore the model.
     */
    public function restore(
        Utilisateur $utilisateur,
        StructureFinanciere $model
    ): bool {
        return false;
    }

    /**
     * Determine whether the structureFinanciere can permanently delete the model.
     */
    public function forceDelete(
        Utilisateur $utilisateur,
        StructureFinanciere $model
    ): bool {
        return false;
    }
}
