<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Addon;
use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Http\JsonResponse;

class CatalogController extends Controller
{
    public function index(): JsonResponse
    {
        $categories = Category::query()->where('is_active', true)->orderBy(Category::orderColumn())->orderBy('name')
            ->with(['menuItems' => fn ($query) => $query->where('is_available', true)->with(['addons' => fn ($addons) => $addons->where('is_available', true)])])
            ->get();

        return response()->json(['data' => $categories, 'meta' => [
            'timezone' => config('app.timezone'),
            'weekday' => now()->format('l'),
            'contact' => ['phone' => '081374707480', 'instagram' => '@warung jamsek'],
        ]]);
    }

    public function show(MenuItem $menuItem): JsonResponse
    {
        abort_unless($menuItem->is_available && $menuItem->category()->where('is_active', true)->exists(), 404);
        $menuItem->load(['category', 'addons' => fn ($query) => $query->where('is_available', true)]);

        return response()->json(['data' => $menuItem]);
    }

    public function addons(): JsonResponse
    {
        return response()->json(['data' => Addon::where('is_available', true)->orderBy('name')->get()]);
    }
}
