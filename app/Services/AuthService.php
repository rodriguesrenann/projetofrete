<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthService
{
    public function login(User $user): void
    {
        Auth::login($user);
    }

    public function attempt(array $data): bool
    {
        return Auth::attempt([
            'email' => $data['email'],
            'password' => $data['password']
        ]);
    }

    public function logout(Request $request): void
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
    }
}
