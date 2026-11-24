<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Schema;

#[Fillable(['name', 'slug', 'description', 'is_active', 'sort_order', 'display_order'])]
class Category extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->timestamps = Schema::hasColumn('categories', 'created_at') && Schema::hasColumn('categories', 'updated_at');
    }

    public static function orderColumn(): string
    {
        return Schema::hasColumn('categories', 'sort_order') ? 'sort_order' : 'display_order';
    }

    public function menuItems(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }
}
