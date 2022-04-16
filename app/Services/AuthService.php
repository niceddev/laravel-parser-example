<?php

namespace App\Services;

use App\Http\Requests\Api\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function register(RegisterRequest $request)
    {
        $credentials = $request->validated();

        $user = User::create([
            'name' => $credentials['name'],
            'avatar' => $credentials['avatar'] === null ? '/images/default.png' : $credentials['avatar'],
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password']),
        ]);

        $token = $user->createToken('user-token')->plainTextToken;

        $response = [
            'user'  => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    function login(string $email, string $password)
    {
        $user = User::where('email', $email)->firstOrFail();

        if ($user && Auth::attempt(['email' => $email, 'password' => $password])) {
            $token = $user->createToken('user-token')->plainTextToken;

            $response = [
                'user'  => $user,
                'token' => $token
            ];

            return response($response, 201);
        }

        return response()->setStatusCode(401);
    }
}
