<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Schema;

#[Fillable(['name', 'description', 'price', 'is_available'])]
class Addon extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->timestamps = Schema::hasColumn('addons', 'created_at') && Schema::hasColumn('addons', 'updated_at');
    }

    protected function casts(): array
    {
        return ['price' => 'decimal:2', 'is_available' => 'boolean'];
    }

    public function menuItems(): BelongsToMany
    {
        $pivotTable = Schema::hasTable('menu_item_addon') ? 'menu_item_addon' : 'menu_item_addons';

        return $this->belongsToMany(MenuItem::class, $pivotTable);
    }
}
