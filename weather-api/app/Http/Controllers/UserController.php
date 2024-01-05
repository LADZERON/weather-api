<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\EditRequest;
use App\Http\Resources\User\UserCollectionResource;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Services\User\UserServices;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, User::class);
    }

    /**
     * @authenticated
     * Display a listing of users.
     */
    public function index(UserServices $userServices): UserCollectionResource
    {
        return $userServices->showAllUsers();
    }

    /**
     * @authenticated
     * Display the specified user.
     *
     * @param  UserServices  $userServices
     */
    public function show(User $user): UserResource
    {
        return new UserResource($user);
    }

    /**
     * Update the specified user.
     *
     * @authenticated
     */
    public function update(EditRequest $editRequest, User $user): UserResource
    {
        $user->update($editRequest->validated());

        return new UserResource($user);
    }

    /**
     * @authenticated
     * Display the current user.
     */
    public function profile(): UserResource
    {
        return new UserResource(auth()->user());
    }
}
