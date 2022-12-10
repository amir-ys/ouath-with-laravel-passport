<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials)) {
            $accessToken = Auth::guard('api')->user()->createToken('oauth-app')->accessToken;
            return response()->json([
                'message' => 'successfully login',
                'token' => $accessToken,
            ]);
        } else {
            return response()->json([
                'message' => 'invalid login',
            ]);
        }
    }

    public function showInfo()
    {
        return response()->json([
            'message' => 'success',
            'data' => [
                'user' => \auth()->user()
            ]
        ]);
    }
}
