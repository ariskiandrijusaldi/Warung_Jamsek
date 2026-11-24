<?php

namespace Tests\Feature;

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\Concerns\AuthenticatesCashier;
use Tests\TestCase;

class OrderManagementTest extends TestCase
{
    use AuthenticatesCashier, RefreshDatabase;

    public function test_cashier_can_view_order_detail(): void
    {
        $order = $this->createOrder();

        $this->getJson('/api/v1/cashier/orders/'.$order->id, $this->cashierHeaders())
            ->assertOk()
            ->assertJsonPath('data.order_number', $order->order_number)
            ->assertJsonPath('data.items.0.item_name', 'Ayam Rica Rica + Nasi');
    }

    public function test_cashier_can_upload_payment_proof(): void
    {
        Storage::fake('public');
        $order = $this->createOrder();

        $response = $this->post('/api/v1/cashier/orders/'.$order->id.'/payment-proof', [
            'payment_proof' => UploadedFile::fake()->image('bukti.jpg'),
        ], $this->cashierHeaders());

        $response->assertOk();

        $path = $response->json('data.payment_proof_path');
        $this->assertStringStartsWith('payment-proofs/', $path);
        $response->assertJsonPath('data.order.payment_proof_path', $path);
        Storage::disk('public')->assertExists($path);
        $this->assertDatabaseHas('orders', ['id' => $order->id, 'payment_proof_path' => $path]);
    }

    public function test_payment_proof_must_be_an_image(): void
    {
        Storage::fake('public');
        $order = $this->createOrder();

        $this->post('/api/v1/cashier/orders/'.$order->id.'/payment-proof', [
            'payment_proof' => UploadedFile::fake()->create('bukti.pdf', 100, 'application/pdf'),
        ], $this->cashierHeaders())->assertUnprocessable()->assertJsonValidationErrors('payment_proof');
    }

    private function createOrder(): Order
    {
        $order = Order::create([
            'order_number' => 'WJ-261124-ORDER01',
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

        return $order;
    }
}
