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
        $fields = $request->validate([
            "Username" => "required|string|unique:users,username",
            "FirstName" => "required|string",
            "LastName" => "required|string",
            "Email" => "required|string|unique:users,email|email",
            "Password" => "required|string|confirmed"
        ]);

        $user = User::create([
            "Username" => $fields["Username"],
            "FirstName" => $fields["FirstName"],
            "LastName" => $fields["LastName"],
            "Email" => $fields["Email"],
            "Password" => Hash::make($fields["Password"])
        ]);

        $token = $user->createToken("test")->plainTextToken;

        return response([
            "user" => $user,
            "token" => $token,
        ], 201);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            "Username" => "required|string",
            "Password" => "required|string"
        ]);

        $user = User::where("Username", $fields["Username"])->first();

        if (!$user || !Hash::check($fields["Password"], $user->Password)) {
            return response([
                "message" => "Username or Password is Incorrect"
            ], 401);
        }

        $token = $user->createToken("test")->plainTextToken;

        return response([
            "user" => $user,
            "token" => $token,
        ], 201);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response([
            "message" => "Logged Out",
        ], 200);
    }
}
