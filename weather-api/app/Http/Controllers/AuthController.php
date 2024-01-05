<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequst;
use App\Http\Requests\RegistrationRequst;
use App\Services\User\AuthUserServices;

class AuthController extends Controller
{
    public function login(LoginRequst $request, AuthUserServices $authUserServices): \Illuminate\Http\JsonResponse
    {
        return $authUserServices->login($request);
    }

    /**
     * @authenticated
     *
     * @param  RegistrationRequst  $request
     * @param  AuthUserServices  $authUserServices
     */
    public function logout(): \Illuminate\Http\JsonResponse
    {
        if (auth()->user()) {
            auth()->user()->tokens()->delete();

            return response()->json(['message' => 'Successfully logged out']);
        }

        return response()->json(['error' => 'Unauthenticated'], 401);
    }
}
