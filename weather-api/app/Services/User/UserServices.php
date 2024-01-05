<?php

namespace App\Services\User;

use App\Http\Resources\User\UserCollectionResource;
use App\Models\User;

class UserServices
{
    public function showAllUsers()
    {
        return new UserCollectionResource(User::all());
    }
}
