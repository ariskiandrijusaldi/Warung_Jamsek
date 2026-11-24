<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Schema;

#[Fillable(['order_number', 'customer_name', 'customer_address', 'customer_phone', 'delivery_notes', 'payment_method', 'payment_proof_path', 'payment_status', 'order_status', 'subtotal', 'total', 'menu_subtotal', 'addon_subtotal', 'grand_total', 'handled_by'])]
class Order extends Model
{
    protected $appends = ['subtotal', 'total'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->timestamps = Schema::hasColumn('orders', 'created_at') && Schema::hasColumn('orders', 'updated_at');
    }

    protected function casts(): array
    {
        return ['subtotal' => 'decimal:2', 'total' => 'decimal:2'];
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function handler(): BelongsTo
    {
        return $this->belongsTo(User::class, 'handled_by');
    }

    public function getSubtotalAttribute(): ?string
    {
        if (array_key_exists('subtotal', $this->attributes)) {
            return $this->attributes['subtotal'];
        }

        $menuSubtotal = (float) ($this->attributes['menu_subtotal'] ?? 0);
        $addonSubtotal = (float) ($this->attributes['addon_subtotal'] ?? 0);

        return number_format($menuSubtotal + $addonSubtotal, 2, '.', '');
    }

    public function getTotalAttribute(): ?string
    {
        return $this->attributes['total'] ?? $this->attributes['grand_total'] ?? null;
    }
}
