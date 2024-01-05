<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('registration', [\App\Http\Controllers\RegistrationController::class, 'store'])->name('registration');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

    Route::prefix('user')->group(
        function () {
            Route::get('/profile', [\App\Http\Controllers\UserController::class, 'profile'])->name('user.profile');
            Route::get('/{user}', [\App\Http\Controllers\UserController::class, 'show'])->name('user.show');
            Route::put('/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('user.update');
        }
    );

});
