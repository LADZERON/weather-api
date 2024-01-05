<?php

namespace App\Services\User;

use App\Http\Requests\RegistrationRequst;
use App\Models\User;

class RegistrationServices
{
    /**
     * Registration new user.
     *
     * @param  RegistrationServices  $registrationServices
     */
    public function registration(RegistrationRequst $request): \Illuminate\Http\JsonResponse
    {
        User::create($request->only(['name', 'email', 'password']));

        return response()->json(['message' => 'Successfully created user!']);
    }
}
