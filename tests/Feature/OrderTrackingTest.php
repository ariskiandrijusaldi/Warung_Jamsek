<?php

namespace Tests\Feature;

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTrackingTest extends TestCase
{
    use RefreshDatabase;

    public function test_customer_can_track_order_by_order_number(): void
    {
        $order = Order::create([
            'order_number' => 'WJ-261124-TEST1234',
            'customer_name' => 'Pelanggan Tes',
            'customer_address' => 'Jl. Contoh No. 10',
            'customer_phone' => '081234567890',
            'delivery_notes' => 'Rumah pagar hitam',
            'payment_method' => 'cod',
            'payment_status' => 'unpaid',
            'order_status' => 'pending',
            'subtotal' => 22000,
            'total' => 22000,
        ]);

        $order->items()->create([
            'menu_item_id' => null,
            'item_name' => 'Ayam Rica Rica + Nasi',
            'unit_price' => 20000,
            'quantity' => 1,
            'item_note' => 'Tidak pedas',
            'line_total' => 22000,
        ]);

        $response = $this->getJson('/api/v1/orders/track?order_number=WJ-261124-TEST1234');

        $response->assertOk()
            ->assertJsonPath('data.order_number', 'WJ-261124-TEST1234')
            ->assertJsonPath('data.order_status', 'pending')
            ->assertJsonPath('data.payment_status', 'unpaid')
            ->assertJsonPath('data.customer_name', 'Pelanggan Tes')
            ->assertJsonPath('data.items.0.item_name', 'Ayam Rica Rica + Nasi')
            ->assertJsonStructure([
                'data' => [
                    'order_number',
                    'order_status',
                    'payment_status',
                    'payment_method',
                    'ordered_at',
                    'customer_name',
                    'items' => [
                        ['item_name', 'quantity', 'unit_price', 'line_total', 'item_note', 'addons'],
                    ],
                    'subtotal',
                    'total',
                ],
            ])
            ->assertJsonMissingPath('data.customer_address')
            ->assertJsonMissingPath('data.customer_phone');
    }

    public function test_tracking_unknown_order_returns_not_found(): void
    {
        $this->getJson('/api/v1/orders/track?order_number=WJ-000000-UNKNOWN')
            ->assertNotFound()
            ->assertJsonPath('message', 'Pesanan tidak ditemukan.');
    }

    public function test_order_number_is_required(): void
    {
        $this->getJson('/api/v1/orders/track')
            ->assertUnprocessable()
            ->assertJsonValidationErrors('order_number');
    }
}
