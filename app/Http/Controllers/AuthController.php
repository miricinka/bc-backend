<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Handle login
     * Created bearer token
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Handle logout
     * Delete bearer token
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logout successful']);
    }
}
