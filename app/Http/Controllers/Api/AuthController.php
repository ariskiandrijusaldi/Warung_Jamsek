<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate(['email' => ['required', 'email'], 'password' => ['required', 'string']]);
        $user = User::where('email', $credentials['email'])->first();

        if (! $user || $user->role !== 'cashier' || ! ($user->is_active ?? true) || ! Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages(['email' => ['Email atau password tidak valid.']]);
        }

        $plainTextToken = Str::random(64);
        $expiresAt = now()->addDays(30);
        Cache::put('cashier-token:'.hash('sha256', $plainTextToken), $user->id, $expiresAt);

        return response()->json([
            'data' => ['token' => $plainTextToken, 'token_type' => 'Bearer', 'expires_at' => $expiresAt->toISOString(), 'user' => $user->only(['id', 'name', 'email', 'role'])],
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $tokenHash = $request->attributes->get('cashier_token_hash');
        if ($tokenHash) {
            Cache::forget('cashier-token:'.$tokenHash);
        }

        return response()->json(['message' => 'Berhasil logout.']);
    }

    public function me(Request $request): JsonResponse
    {
        return response()->json(['data' => $request->user()->only(['id', 'name', 'email', 'role'])]);
    }
}
