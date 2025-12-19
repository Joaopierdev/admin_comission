<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request)
    {
        
        $token = $this->authService->login($request);
        
        if(!$token)
        {
            return response()->json(['erro' => 'Usuário ou senha inválido'], 403);
        }

        return response()->json(['token' => $token]);
    }

    public function logout()
    {
        $this->authService->logoutUser();

        return response()->json(['message' => 'Logout Realizado com sucesso'], 200);
    }

    public function refresh()
    {
        $refreshedToken = $this->authService->refreshToken();

        return response()->json(['token'=> $refreshedToken]);
    }

    public function me()
    {
        $user = $this->authService->getUserAuthenticated();

        return response()->json(['data' => $user]);
    }

}
