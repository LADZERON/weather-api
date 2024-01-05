<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RefreshUserActivity
{
    public const TIME_TO_UPDATE_EXPIRE_TOKEN = 2;

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $user = Auth::user();
            $accessSanctum = $user?->currentAccessToken();
            if ($accessSanctum &&
                ($accessSanctum->expires_at?->diffInMinutes(now()) >= self::TIME_TO_UPDATE_EXPIRE_TOKEN
                || $accessSanctum->expires_at === null)
            ) {
                $accessSanctum->update(['expires_at' => $accessSanctum->last_used_at->addSeconds(config('sanctum.expiration'))]);
            }

            return $next($request);
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());

            return $next($request);
        }
    }
}
