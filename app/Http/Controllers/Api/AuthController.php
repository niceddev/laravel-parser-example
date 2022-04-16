<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\Api\UserResponse;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request)
    {
        $this->authService->register($request);

        return $this->authService->login($request['email'], $request['password']);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        $email = $credentials['email'];
        $password = $credentials['password'];

        $user = $this->authService->login($email, $password);

        return UserResponse::collection($user);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        auth()->logout();

        return redirect('/');
    }
}
