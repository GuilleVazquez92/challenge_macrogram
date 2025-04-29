<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function register(array $data): array
    {
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $token = $user->createToken('authToken')->plainTextToken;

        return ['token' => $token, 'user' => $user];
    }

    public function login(array $credentials): array|null
    {
        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return null;
        }

        $token = $user->createToken('authToken')->plainTextToken;

        return ['token' => $token, 'user' => $user];
    }

    public function logout($user): void
    {
        $user->tokens()->delete();
    }
}
