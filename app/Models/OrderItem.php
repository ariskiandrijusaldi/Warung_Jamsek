<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Schema;

#[Fillable(['order_id', 'menu_item_id', 'item_name', 'unit_price', 'quantity', 'item_note', 'line_total', 'subtotal'])]
class OrderItem extends Model
{
    protected $appends = ['item_name', 'line_total'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->timestamps = Schema::hasColumn('order_items', 'created_at') && Schema::hasColumn('order_items', 'updated_at');
    }

    protected function casts(): array
    {
        return ['unit_price' => 'decimal:2', 'line_total' => 'decimal:2'];
    }

    public function addons(): HasMany
    {
        return $this->hasMany(OrderItemAddon::class);
    }

    public function menuItem(): BelongsTo
    {
        return $this->belongsTo(MenuItem::class);
    }

    public function getItemNameAttribute(): ?string
    {
        return $this->attributes['item_name'] ?? $this->menuItem?->name;
    }

    public function getLineTotalAttribute(): ?string
    {
        return $this->attributes['line_total'] ?? $this->attributes['subtotal'] ?? null;
    }
}
