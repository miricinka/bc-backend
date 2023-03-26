<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $token = $request->user()->createToken('api_token')->plainTextToken;
            $username = $request->user()->username;
            $role = $request->user()->role;

            return response()->json(['token' => $token, 'username' => $username, 'role' => $role]);
        }

        return response()->json(['message' => 'Invalid login credentials'], 401);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logout successful']);
    }
}
