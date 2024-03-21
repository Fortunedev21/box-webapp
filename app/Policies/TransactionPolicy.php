<?php

namespace App\Policies;

use App\Models\Transaction;
use App\Models\Utilisateur;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransactionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the transaction can view any models.
     */
    public function viewAny(Utilisateur $utilisateur): bool
    {
        return $utilisateur->hasPermissionTo('list transactions');
    }

    /**
     * Determine whether the transaction can view the model.
     */
    public function view(Utilisateur $utilisateur, Transaction $model): bool
    {
        return $utilisateur->hasPermissionTo('view transactions');
    }

    /**
     * Determine whether the transaction can create models.
     */
    public function create(Utilisateur $utilisateur): bool
    {
        return $utilisateur->hasPermissionTo('create transactions');
    }

    /**
     * Determine whether the transaction can update the model.
     */
    public function update(Utilisateur $utilisateur, Transaction $model): bool
    {
        return $utilisateur->hasPermissionTo('update transactions');
    }

    /**
     * Determine whether the transaction can delete the model.
     */
    public function delete(Utilisateur $utilisateur, Transaction $model): bool
    {
        return $utilisateur->hasPermissionTo('delete transactions');
    }

    /**
     * Determine whether the utilisateur can delete multiple instances of the model.
     */
    public function deleteAny(Utilisateur $utilisateur): bool
    {
        return $utilisateur->hasPermissionTo('delete transactions');
    }

    /**
     * Determine whether the transaction can restore the model.
     */
    public function restore(Utilisateur $utilisateur, Transaction $model): bool
    {
        return false;
    }

    /**
     * Determine whether the transaction can permanently delete the model.
     */
    public function forceDelete(
        Utilisateur $utilisateur,
        Transaction $model
    ): bool {
        return false;
    }
}
