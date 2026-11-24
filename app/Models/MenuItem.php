<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Schema;

#[Fillable(['category_id', 'name', 'slug', 'description', 'price', 'image_url', 'image_path', 'is_available', 'available_day', 'sort_order'])]
class MenuItem extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->timestamps = Schema::hasColumn('menu_items', 'created_at') && Schema::hasColumn('menu_items', 'updated_at');
    }

    protected function casts(): array
    {
        return ['price' => 'decimal:2', 'is_available' => 'boolean'];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function addons(): BelongsToMany
    {
        $pivotTable = Schema::hasTable('menu_item_addon') ? 'menu_item_addon' : 'menu_item_addons';

        return $this->belongsToMany(Addon::class, $pivotTable);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
