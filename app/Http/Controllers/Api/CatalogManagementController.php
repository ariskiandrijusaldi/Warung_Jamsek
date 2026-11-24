<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Addon;
use App\Models\Category;
use App\Models\MenuItem;
use App\Models\OrderItemAddon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CatalogManagementController extends Controller
{
    public function categories(): JsonResponse
    {
        return response()->json(['data' => Category::withCount('menuItems')->orderBy(Category::orderColumn())->get()]);
    }

    public function category(Category $category): JsonResponse
    {
        return response()->json(['data' => $category->loadCount('menuItems')]);
    }

    public function saveCategory(Request $request, ?Category $category = null): JsonResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'], 'slug' => ['nullable', 'string', 'max:120', 'unique:categories,slug,'.($category?->id ?? 'NULL')],
            'description' => ['nullable', 'string', 'max:2000'], 'is_active' => ['sometimes', 'boolean'], 'sort_order' => ['sometimes', 'integer', 'min:0', 'max:65535'],
        ]);
        if (! Schema::hasColumn('categories', 'description')) {
            unset($data['description']);
        }
        if (! Schema::hasColumn('categories', 'sort_order')) {
            $data['display_order'] = $data['sort_order'] ?? $category?->display_order ?? 0;
            unset($data['sort_order']);
        }
        $data['slug'] = $data['slug'] ?? Str::slug($data['name']);
        $category ? $category->update($data) : $category = Category::create($data);

        return response()->json(['data' => $category->fresh()], $request->isMethod('post') ? 201 : 200);
    }

    public function deleteCategory(Category $category): JsonResponse
    {
        abort_if($category->menuItems()->exists(), 409, 'Kategori masih memiliki menu.');
        $category->delete();

        return response()->json(['message' => 'Kategori dihapus.']);
    }

    public function menuItems(): JsonResponse
    {
        $orderColumn = Schema::hasColumn('menu_items', 'sort_order') ? 'sort_order' : 'id';

        return response()->json(['data' => MenuItem::with('category', 'addons')->orderBy($orderColumn)->paginate(30)]);
    }

    public function menuItem(MenuItem $menuItem): JsonResponse
    {
        return response()->json(['data' => $menuItem->load(['category', 'addons'])]);
    }

    public function saveMenuItem(Request $request, ?MenuItem $menuItem = null): JsonResponse
    {
        $data = $request->validate([
            'category_id' => ['required', 'integer', 'exists:categories,id'], 'name' => ['required', 'string', 'max:150'],
            'slug' => ['nullable', 'string', 'max:160'], 'description' => ['nullable', 'string', 'max:3000'],
            'price' => ['required', 'numeric', 'min:0', 'max:9999999999.99'], 'image_url' => ['nullable', 'string', 'max:2048'],
            'image_path' => ['nullable', 'string', 'max:2048'],
            'is_available' => ['sometimes', 'boolean'], 'available_day' => ['nullable', 'in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday'],
            'sort_order' => ['sometimes', 'integer', 'min:0', 'max:65535'], 'addon_ids' => ['sometimes', 'array'],
            'addon_ids.*' => ['integer', 'distinct', 'exists:addons,id'],
        ]);
        $addonIds = $data['addon_ids'] ?? null;
        unset($data['addon_ids']);
        $data['slug'] = $data['slug'] ?? Str::slug($data['name']);
        if (! Schema::hasColumn('menu_items', 'slug')) {
            unset($data['slug']);
        }
        if (! Schema::hasColumn('menu_items', 'sort_order')) {
            unset($data['sort_order']);
        }
        if (! Schema::hasColumn('menu_items', 'image_url')) {
            $data['image_path'] = $data['image_path'] ?? $data['image_url'] ?? null;
            unset($data['image_url']);
        }
        $menuItem ? $menuItem->update($data) : $menuItem = MenuItem::create($data);
        if ($addonIds !== null) {
            $menuItem->addons()->sync($addonIds);
        }

        return response()->json(['data' => $menuItem->fresh(['category', 'addons'])], $request->isMethod('post') ? 201 : 200);
    }

    public function deleteMenuItem(MenuItem $menuItem): JsonResponse
    {
        abort_if($menuItem->orderItems()->exists(), 409, 'Menu sudah digunakan pada pesanan.');
        $menuItem->addons()->detach();
        $menuItem->delete();

        return response()->json(['message' => 'Menu dihapus.']);
    }

    public function addons(): JsonResponse
    {
        return response()->json(['data' => Addon::withCount('menuItems')->orderBy('name')->get()]);
    }

    public function addon(Addon $addon): JsonResponse
    {
        return response()->json(['data' => $addon->loadCount('menuItems')]);
    }

    public function saveAddon(Request $request, ?Addon $addon = null): JsonResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120', 'unique:addons,name,'.($addon?->id ?? 'NULL')],
            'description' => ['nullable', 'string', 'max:2000'], 'price' => ['required', 'numeric', 'min:0', 'max:9999999999.99'],
            'is_available' => ['sometimes', 'boolean'],
        ]);
        if (! Schema::hasColumn('addons', 'description')) {
            unset($data['description']);
        }
        $addon ? $addon->update($data) : $addon = Addon::create($data);

        return response()->json(['data' => $addon->fresh()], $request->isMethod('post') ? 201 : 200);
    }

    public function deleteAddon(Addon $addon): JsonResponse
    {
        abort_if(OrderItemAddon::where('addon_id', $addon->id)->exists(), 409, 'Additional sudah digunakan pada pesanan.');
        $addon->menuItems()->detach();
        $addon->delete();

        return response()->json(['message' => 'Additional dihapus.']);
    }

    public function uploadMenuItemImage(Request $request, MenuItem $menuItem): JsonResponse
    {
        $data = $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $column = Schema::hasColumn('menu_items', 'image_path') ? 'image_path' : 'image_url';

        if ($menuItem->{$column}) {
            Storage::disk('public')->delete($menuItem->{$column});
        }

        $path = $data['image']->store('menu-images', 'public');
        $menuItem->update([$column => $path]);

        return response()->json(['data' => [
            'image_path' => $path,
            'image_url' => Storage::disk('public')->url($path),
            'menu_item' => $menuItem->fresh(['category', 'addons']),
        ]]);
    }

    public function deleteMenuItemImage(MenuItem $menuItem): JsonResponse
    {
        $column = Schema::hasColumn('menu_items', 'image_path') ? 'image_path' : 'image_url';

        if ($menuItem->{$column}) {
            Storage::disk('public')->delete($menuItem->{$column});
            $menuItem->update([$column => null]);
        }

        return response()->json(['message' => 'Foto menu dihapus.']);
    }
}
