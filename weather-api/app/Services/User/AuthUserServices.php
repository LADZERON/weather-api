<?php

namespace App\Services\User;

class AuthUserServices
{
    public function login($request)
    {
        $credentials = $request->only(['email', 'password']);

        if (! auth()->attempt($credentials)) {
            return response()->json(['error' => 'Wrong email or password'], 401);
        }

        $token = auth()->user()->createToken(name: 'authToken', expiresAt: now()->addSeconds(config('sanctum.expiration')))->plainTextToken;

        return response()->json(['token' => $token]);
    }
}
