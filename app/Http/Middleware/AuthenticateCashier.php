<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateCashier
{
    public function handle(Request $request, Closure $next): Response
    {
        $plainTextToken = $request->bearerToken();

        if (! $plainTextToken) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        $tokenHash = hash('sha256', $plainTextToken);
        $userId = Cache::get('cashier-token:'.$tokenHash);
        $user = $userId ? User::find($userId) : null;

        if (! $user || $user->role !== 'cashier' || ! ($user->is_active ?? true)) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        $request->setUserResolver(fn () => $user);
        $request->attributes->set('cashier_token_hash', $tokenHash);

        return $next($request);
    }
}
