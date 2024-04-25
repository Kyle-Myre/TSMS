<?php

namespace App\Policies;

use App\Models\Chip;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ChipPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isProvider() || $user->isUser();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Chip $chip): bool
    {
        return $user->isAdmin() || $user->isProvider() || $user->isUser();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isProvider();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Chip $chip): bool
    {
        return $user->isAdmin() || $user->isProvider();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Chip $chip): bool
    {
        return $user->isAdmin() || $user->isProvider();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Chip $chip): bool
    {
        return $user->isAdmin() || $user->isProvider();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Chip $chip): bool
    {
        return $user->isAdmin() || $user->isProvider();
    }
}
