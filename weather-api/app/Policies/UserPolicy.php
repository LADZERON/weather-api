<?php

namespace App\Policies;

use App\Enums\PermissionsEnum;
use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo(PermissionsEnum::VIEW_USERS);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        return $user->hasPermissionTo(PermissionsEnum::VIEW_USERS) || ($user->hasPermissionTo(PermissionsEnum::VIEW_PROFILE) && $user->id === auth()->id());
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return $user->hasPermissionTo(PermissionsEnum::EDIT_USERS);
    }
}
