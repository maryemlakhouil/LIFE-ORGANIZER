<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function __construct(
        protected UserRepositoryInterface $userRepository
    ) {}

    public function register(array $data): User
    {
        return $this->userRepository->create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => $data['password'],
            'role'      => $data['role'] ?? 'parent',
            'photo'     => $data['photo'] ?? null,
            'is_active' => true,
        ]);
    }

    public function login(array $credentials, bool $remember = false): void
    {
        $user = $this->userRepository->findByEmail($credentials['email']);

        if (! $user || ! $user->is_active) {
            throw ValidationException::withMessages([
                'email' => 'Votre compte est introuvable ou désactivé.',
            ]);
        }

        if (! Auth::attempt($credentials, $remember)) {
            throw ValidationException::withMessages([
                'email' => 'Les identifiants sont incorrects.',
            ]);
        }

        request()->session()->regenerate();
    }

    public function logout(): void
    {
        Auth::guard('web')->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
    }
}