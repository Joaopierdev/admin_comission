<?php

namespace App\Services;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthService{

    public function login(LoginRequest $request)
    {

        $request = $request->all(['email', 'password']);
        $tokenIsValid = $this->validateDataLogin($request);

        return $tokenIsValid;
    }

    public function validateDataLogin($request)
    {
        $token = auth('api')->attempt($request);
        if(!$token)
        {
            return false;
        }

        return $token;
    }


    public function validateAuthentication()
    {
        return $this->getUserAuthenticated();
    }   

    public function getUserAuthenticated(){
        return auth()->user();
    }


    public function refreshToken()
    {
        return auth('api')->refresh();
    }

    public function logoutUser(){
        return auth('api')->logout();
    }

}