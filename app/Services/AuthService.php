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
        $user = User::create([
            'name'     => $request->input('name'),
            'avatar'   => $request->input('avatar', '/images/default.png'),
            'email'    => $request->input('email'),
            'password' => Hash::make($request->input('password')),
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
