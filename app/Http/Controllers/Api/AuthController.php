<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:parent,nounou,admin',
            'experience_years' => 'nullable|integer|min:0|max:60',
            'hourly_rate' => 'nullable|numeric|min:0|max:9999.99',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'is_active' => true,
            'experience_years' => $validated['experience_years'] ?? null,
            'hourly_rate' => $validated['hourly_rate'] ?? null,
        ]);

        $token = auth('api')->login($user);

        return response()->json([
            'message' => 'Inscription réussie',
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
        ], 201);
    }

    // Login methode 

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (! $user || ! $user->is_active) {
            return response()->json([
                'message' => 'Votre compte est introuvable ou désactivé',
            ], 403);
        }

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json([
                'message' => 'Email ou mot de passe incorrect',
            ], 401);
        }

        return response()->json([
            'message' => 'Connexion réussie',
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth('api')->user(),
        ]);
    }

    public function me()
    {
        return response()->json([
            'user' => auth('api')->user()->fresh(),
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = auth('api')->user();

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'experience_years' => 'nullable|integer|min:0|max:60',
            'hourly_rate' => 'nullable|numeric|min:0|max:9999.99',
            'bio' => 'nullable|string|max:5000',
            'skills' => 'nullable|array',
            'skills.*' => 'string|max:255',
            'languages' => 'nullable|array',
            'languages.*.name' => 'required_with:languages|string|max:100',
            'languages.*.level' => 'nullable|string|max:100',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($user->photo && str_starts_with($user->photo, '/storage/')) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $user->photo));
            }

            $path = $request->file('photo')->store('profiles', 'public');
            $validated['photo'] = '/storage/' . $path;
        }

        $user->update($validated);

        return response()->json([
            'message' => 'Profil mis à jour avec succès.',
            'user' => $user->fresh(),
        ]);
    }

    public function logout()
    {
        auth('api')->logout();

        return response()->json([
            'message' => 'Déconnexion réussie',
        ]);
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink($request->only('email'));

        return response()->json([
            'message' => __($status),
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        return response()->json([
            'message' => __($status),
        ]);
    }
}
