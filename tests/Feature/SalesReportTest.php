<?php

namespace Tests\Feature;

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Tests\Concerns\AuthenticatesCashier;
use Tests\TestCase;

class SalesReportTest extends TestCase
{
    use AuthenticatesCashier, RefreshDatabase;

    public function test_cashier_can_view_sales_report(): void
    {
        $this->createOrder('WJ-261124-RPT0001', 'completed', 'paid', 25000, 'Ayam Rica Rica + Nasi', '2026-11-20 10:00:00');
        $this->createOrder('WJ-261124-RPT0002', 'pending', 'unpaid', 15000, 'Es Teh', '2026-11-21 11:00:00');
        $this->createOrder('WJ-261124-RPT0003', 'cancelled', 'paid', 30000, 'Nasi Goreng', '2026-11-22 12:00:00');

        $response = $this->getJson(
            '/api/v1/cashier/reports/sales?from=2026-11-01&to=2026-11-30',
            $this->cashierHeaders(),
        );

        $response->assertOk()
            ->assertJsonPath('data.summary.total_orders', 3)
            ->assertJsonPath('data.summary.paid_orders', 1)
            ->assertJsonPath('data.summary.unpaid_orders', 1)
            ->assertJsonPath('data.summary.cancelled_orders', 1)
            ->assertJsonPath('data.summary.total_revenue', '25000.00')
            ->assertJsonPath('data.summary.average_order_value', '25000.00')
            ->assertJsonPath('data.orders_by_status.pending', 1)
            ->assertJsonPath('data.orders_by_status.completed', 1)
            ->assertJsonPath('data.orders_by_status.cancelled', 1)
            ->assertJsonCount(2, 'data.daily')
            ->assertJsonPath('data.daily.0.date', '2026-11-20')
            ->assertJsonPath('data.daily.0.revenue', '25000.00')
            ->assertJsonPath('data.daily.1.date', '2026-11-21')
            ->assertJsonCount(2, 'data.top_menu_items')
            ->assertJsonPath('data.top_menu_items.0.item_name', 'Ayam Rica Rica + Nasi');
    }

    public function test_cashier_can_view_today_dashboard(): void
    {
        $this->createOrder('WJ-261124-DSB0001', 'pending', 'paid', 10000, 'Ayam Rica Rica + Nasi');
        $this->createOrder('WJ-261124-DSB0002', 'pending', 'unpaid', 15000, 'Es Teh');

        $this->getJson('/api/v1/cashier/dashboard', $this->cashierHeaders())
            ->assertOk()
            ->assertJsonPath('data.total_orders', 2)
            ->assertJsonPath('data.pending_orders', 2)
            ->assertJsonPath('data.revenue', '10000.00');
    }

    private function createOrder(
        string $orderNumber,
        string $orderStatus,
        string $paymentStatus,
        float $total,
        string $itemName,
        ?string $createdAt = null,
    ): Order {
        $order = Order::create([
            'order_number' => $orderNumber,
            'customer_name' => 'Pelanggan Tes',
            'customer_address' => 'Jl. Contoh No. 10',
            'customer_phone' => '081234567890',
            'payment_method' => 'cod',
            'payment_status' => $paymentStatus,
            'order_status' => $orderStatus,
            'subtotal' => $total,
            'total' => $total,
        ]);

        $order->items()->create([
            'menu_item_id' => null,
            'item_name' => $itemName,
            'unit_price' => $total,
            'quantity' => 1,
            'line_total' => $total,
        ]);

        if ($createdAt) {
            $order->created_at = Carbon::parse($createdAt);
            $order->updated_at = Carbon::parse($createdAt);
            $order->save();
        }

        return $order;
    }
}
