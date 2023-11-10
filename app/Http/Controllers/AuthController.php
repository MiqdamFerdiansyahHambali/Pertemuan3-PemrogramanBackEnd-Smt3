<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // get input
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        // insert ke table user
        $user = User::create($input);

        $response = [
            'message' => "Akun berhasil dibuat",
            'data' => $user
        ];

        return response()->json($response, 200);
    }

    public function login(Request $request)
    {
        // get input
        $input = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // get data email user
        $user = User::where('email', $input['email'])->first();

        // check kondisi input dengan data dari table user
        $isLoginSuccess = ($input['email'] === $user->email && Hash::check($input['password'], $user->password));

        // handle login
        if (!$isLoginSuccess) {
            $error = [
                'message' => "Login gagal ! email atau password salah"
            ];

            return response()->json($error, 401);
        } else {
            // buat token
            $token = $user->createToken('authToken');

            $response = [
                'message' => "Login Berhasil !",
                'data' => $user,
                'token' => $token->plainTextToken,
            ];

            return response()->json($response, 200);
        }
    }
}
