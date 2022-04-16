<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function show()
    {
        $response = [
            'user' => auth()->user(),
//            'token' => auth()->user()->tokens()
        ];

        return $response;
    }
}
