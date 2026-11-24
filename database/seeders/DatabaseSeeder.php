<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach (['Makanan', 'New Menu', 'Minuman'] as $sortOrder => $name) {
            Category::firstOrCreate(
                ['slug' => str($name)->slug()->toString()],
                ['name' => $name, 'is_active' => true, 'sort_order' => $sortOrder],
            );
        }

        $cashierEmail = env('CASHIER_EMAIL');
        $cashierPassword = env('CASHIER_PASSWORD');

        if ($cashierEmail && $cashierPassword) {
            User::updateOrCreate(
                ['email' => $cashierEmail],
                ['name' => env('CASHIER_NAME', 'Kasir'), 'password' => $cashierPassword, 'role' => 'cashier'],
            );
        }
    }
}
