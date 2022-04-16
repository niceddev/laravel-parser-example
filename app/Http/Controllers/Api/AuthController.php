<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use App\Http\Resources\Api\UserResponse;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(AuthRequest $request)
    {
        dd('asd');
        $this->authService->register($request);

        return $this->authService->login($request);
    }

    public function login(AuthRequest $request)
    {
        $user = $this->authService->login($request);

        return UserResponse::collection($user);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        auth()->logout();

        return redirect('/');
    }
}
