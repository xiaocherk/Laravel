<?php
//2|Z06VGVqhIzY5U257TAFGmexPacCKOHfYbtPo1HmH
//3|vCJSrMI3eTgjYrETY4t3Bm3B1ypvArcDsmGHEo2c

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rgform;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:50|unique:users,email',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $token = $user->createToken('PersonToken')->plainTextToken;

        $response = [
            'person' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:50|',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $data['email'])->first();

        if (!Hash::check($data['password'], $user->password) || !$user) {
            return response([
                'message' => 'Email or password mismatch',
            ], 401);
        } else {
            $token = $user->createToken('LoginToken')->plainTextToken;
            $response = [
                'person' => $user,
                'token' => $token,
            ];

            return response($response, 200);
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response([
            'message' => 'You have logged out.'
        ]);
    }
}
