<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequst;
use App\Services\User\RegistrationServices;

class RegistrationController extends Controller
{
    /**
     * Registration new user.
     */
    public function store(RegistrationRequst $request, RegistrationServices $registrationServices): \Illuminate\Http\JsonResponse
    {
        return $registrationServices->registration($request);
    }
}
