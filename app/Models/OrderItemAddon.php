<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Schema;

#[Fillable(['order_item_id', 'addon_id', 'addon_name', 'unit_price', 'quantity', 'line_total', 'subtotal'])]
class OrderItemAddon extends Model
{
    protected $appends = ['addon_name', 'line_total'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->timestamps = Schema::hasColumn('order_item_addons', 'created_at') && Schema::hasColumn('order_item_addons', 'updated_at');
    }

    protected function casts(): array
    {
        return ['unit_price' => 'decimal:2', 'line_total' => 'decimal:2'];
    }

    public function addon(): BelongsTo
    {
        return $this->belongsTo(Addon::class);
    }

    public function getAddonNameAttribute(): ?string
    {
        return $this->attributes['addon_name'] ?? $this->addon?->name;
    }

    public function getLineTotalAttribute(): ?string
    {
        return $this->attributes['line_total'] ?? $this->attributes['subtotal'] ?? null;
    }
}
