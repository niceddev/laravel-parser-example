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
        $user->createToken('user-token');

        return $user;
    }

    function login(string $email, string $password)
    {
        $user = User::where('email', $email)->firstOrFail();

        dd($user);
        Auth::attempt([
            'email' => $email,
            'password' => $password
        ]);

//        if ($user && Auth::attempt($request->validated())) {
//            dd($user->createToken('user-token'));
//        }

        dd(auth()->user());

        return null;
    }
}
