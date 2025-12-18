<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\UserAdminService;

class AuthController extends Controller
{
    protected $userAdminService;
    public function __construct(UserAdminService $userAdminService)
    {
        $this->userAdminService = $userAdminService;
    }

    public function login(LoginRequest $request)
    {
        $data = $request->all(['email', 'password']);
        
        $token = $this->userAdminService->login($data);
        
        if(!$token)
        {
            return response()->json(['erro' => 'Usuário ou senha inválido'], 403);
        }

        return response()->json(['token' => $token]);
    }

    public function logout()
    {
        return "logout";
    }

    public function refresh()
    {
        return "refresh";
    }

    public function me()
    {
        return "me";
    }

}
