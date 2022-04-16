<?php

namespace App\Services;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function register(AuthRequest $request)
    {
        $user = User::create($request->validated());
        $user->createToken('user-token');

        return $user;
    }

    function login(AuthRequest $request)
    {
        $user = User::where('email', $request->only('email'))->firstOrFail();

        dd(Auth::attempt($request->only('email', 'password')));

        if ($user && Auth::attempt($request->validated())) {
//            dd($user->createToken('user-token'));

            dd('zxc');

            return response($user, 200);
        }

        return response(null, 401);
    }
}
