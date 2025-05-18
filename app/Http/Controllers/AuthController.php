<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Register user baru.
     */
    public function register(Request $request)
    {
        // Validasi input
        $data = $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|string|email|max:255|unique:users',
            'password'              => 'required|string|min:6|confirmed',
        ]);

        // Buat user
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Generate token
        $token = $user->createToken('api_token')->plainTextToken;

        // Response JSON
        return response()->json([
            'user'          => $user,
            'message'       => 'Registrasi berhasil',
            'access_token'  => $token,
            'token_type'    => 'Bearer',
        ], 201);
    }

    /**
     * Login user.
     */
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email'    => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Cek credential
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Email atau password tidak valid',
            ], 401);
        }

        // Ambil user dan buat token baru
        $user  = Auth::user();
        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json([
            'user'          => $user,
            'message'       => 'Login berhasil',
            'access_token'  => $token,
            'token_type'    => 'Bearer',
        ], 200);
    }

    /**
     * Ambil data profil user yang sedang login.
     */
    public function user(Request $request)
    {
        return response()->json($request->user(), 200);
    }

    /**
     * Logout: hapus token yang sedang digunakan.
     */
    public function logout(Request $request)
    {
        // Hapus token saat ini agar tidak bisa digunakan lagi
        $request->user()
                ->currentAccessToken()
                ->delete();

        return response()->json([
            'message' => 'Logout berhasil',
        ], 200);
    }
}
