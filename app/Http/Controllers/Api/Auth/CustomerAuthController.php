<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class CustomerAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $user = Customer::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $accessToken = $user->createToken('sanctum-app')->plainTextToken;
        return response()->json([
            'message' => 'successfully login',
            'data' => [
                'token' => $accessToken,
                'userIfo' => $user
            ]
        ]);

    }

    public
    function showInfo()
    {
        return response()->json([
            'message' => 'success',
            'data' => [
                'user' => Auth::user()
            ]
        ]);
    }
}
