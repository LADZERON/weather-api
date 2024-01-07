<?php

namespace App\Services\User;

use App\Enums\BaseRoleEnum;
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
        $user = User::create($request->only(['name', 'email', 'password']));
        $user->assignRole(BaseRoleEnum::CLIENT);

        return response()->json(['message' => 'Successfully created user!']);
    }
}
