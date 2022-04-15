<?php

namespace App\Services;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function register(AuthRequest $request)
    {
        $user = User::create($request->validated());
        $user->createToken('user-token');

        return response($user, 201);
    }

    function login(AuthRequest $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();
        dd(Auth::attempt($request->validated()));

        if ($user && Auth::attempt(['email' => $email, 'password' => $password])) {
//            dd($user->createToken('user-token'));

            dd('zxc');

            return response($user, 200);
        }

        return response(null, 401);
    }
}
