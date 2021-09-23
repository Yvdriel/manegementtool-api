<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'house_number' => 'required|integer',
            'house_number_extension' => 'string|nullable',
            'city' => 'required|string',
            'street' => 'required|string',
            'postal_code' => 'required|string',
            'wage_number' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string'
        ]);

        $user = User::create([
            'firstname' => $fields['firstname'],
            'lastname' => $fields['lastname'],
            'house_number' => $fields['house_number'],
            'house_number_extension' => $fields['house_number_extension'],
            'city' => $fields['city'],
            'street' => $fields['street'],
            'postal_code' => $fields['postal_code'],
            'wage_number' => $fields['wage_number'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);

        $token = $user->createToken('managementToolToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $fields['email'])->first();

        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'Message' => 'Wrong email or password'
            ], 401);
        }

        $token = $user->createToken('managementToolToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return response([
            'Message' => 'Logged out'
        ]);
    }
}
