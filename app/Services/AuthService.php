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
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password']),
        ]);

        return $user;
    }

    function login(string $email, string $password)
    {
        $user = User::where('email', $email)->firstOrFail();

        if ($user && Auth::attempt(['email' => $email, 'password' => $password])) {
            $user->createToken('user-token');
            return $user;
        }

        return null;
    }
}
