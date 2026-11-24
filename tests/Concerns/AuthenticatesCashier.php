<?php

namespace Tests\Concerns;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

trait AuthenticatesCashier
{
    /**
     * @return array<string, string>
     */
    protected function cashierHeaders(): array
    {
        $user = User::create([
            'name' => 'Kasir Tes',
            'email' => 'kasir-tes@example.com',
            'password' => 'password',
            'role' => 'cashier',
        ]);

        $token = 'test-cashier-token';
        Cache::put('cashier-token:'.hash('sha256', $token), $user->id, now()->addDay());

        return ['Authorization' => 'Bearer '.$token];
    }
}
