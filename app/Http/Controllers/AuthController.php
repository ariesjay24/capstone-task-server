<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'Username' => 'required|string|unique:users,username',
            'Email' => 'required|string|unique:users,email|email',
            'FirstName' => 'required|string',
            'LastName' => 'required|string',
            'Password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'Username' => $request->input('Username'),
            'FirstName' => $request->input('FirstName'),
            'LastName' => $request->input('LastName'),
            'Email' => $request->input('Email'),
            'Password' => bcrypt($request->input('Password')),
        ]);

        $token = $user->createToken('API Token')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'Username' => 'required|string',
            'Password' => 'required|string',
        ]);

        $user = User::where('Username', $request->input('Username'))->first();

        if (!$user || !Hash::check($request->input('Password'), $user->Password)) {
            return response([
                'message' => 'Username or password is incorrect',
            ], 401);
        }

        $token = $user->createToken('API Token')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token,
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response([
            'message' => 'Logged out',
        ], 200);
    }
}
