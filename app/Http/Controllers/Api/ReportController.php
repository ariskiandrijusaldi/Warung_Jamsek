<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

class ReportController extends Controller
{
    public function dashboard(): JsonResponse
    {
        $dateColumn = Schema::hasColumn('orders', 'created_at') ? 'created_at' : 'ordered_at';
        $orders = Order::whereDate($dateColumn, today())->get();
        $paidOrders = $orders->where('payment_status', 'paid')->where('order_status', '!=', 'cancelled');

        return response()->json(['data' => [
            'date' => today()->toDateString(),
            'total_orders' => $orders->count(),
            'pending_orders' => $orders->where('order_status', 'pending')->count(),
            'processing_orders' => $orders->whereIn('order_status', ['confirmed', 'preparing', 'delivering'])->count(),
            'completed_orders' => $orders->where('order_status', 'completed')->count(),
            'cancelled_orders' => $orders->where('order_status', 'cancelled')->count(),
            'revenue' => $this->money($paidOrders->sum(fn (Order $order) => (float) $order->total)),
        ]]);
    }

    public function sales(Request $request): JsonResponse
    {
        $data = $request->validate([
            'from' => ['nullable', 'date'],
            'to' => ['nullable', 'date', 'after_or_equal:from'],
        ]);

        $from = isset($data['from']) ? Carbon::parse($data['from'])->startOfDay() : now()->startOfMonth();
        $to = isset($data['to']) ? Carbon::parse($data['to'])->endOfDay() : now()->endOfDay();
        $dateColumn = Schema::hasColumn('orders', 'created_at') ? 'created_at' : 'ordered_at';

        $orders = Order::with(['items.menuItem', 'items.addons.addon'])
            ->whereBetween($dateColumn, [$from, $to])
            ->get();

        $activeOrders = $orders->where('order_status', '!=', 'cancelled');
        $paidOrders = $activeOrders->where('payment_status', 'paid');
        $paidRevenue = $paidOrders->sum(fn (Order $order) => (float) $order->total);

        $daily = $activeOrders
            ->groupBy(fn (Order $order) => $this->orderDate($order)->format('Y-m-d'))
            ->map(function ($group, string $date): array {
                $paidGroup = $group->where('payment_status', 'paid');

                return [
                    'date' => $date,
                    'orders' => $group->count(),
                    'paid_orders' => $paidGroup->count(),
                    'revenue' => $this->money($paidGroup->sum(fn (Order $order) => (float) $order->total)),
                ];
            })
            ->sortKeys()
            ->values();

        $topMenuItems = $activeOrders->flatMap(fn (Order $order) => $order->items)
            ->groupBy(fn ($item) => $item->item_name ?? 'Menu')
            ->map(fn ($items, string $name): array => [
                'item_name' => $name,
                'quantity' => $items->sum('quantity'),
                'revenue' => $this->money($items->sum(fn ($item) => (float) $item->line_total)),
            ])
            ->sortByDesc('quantity')
            ->take(5)
            ->values();

        $topAddons = $activeOrders->flatMap(fn (Order $order) => $order->items->flatMap(fn ($item) => $item->addons))
            ->groupBy(fn ($addon) => $addon->addon_name ?? 'Additional')
            ->map(fn ($addons, string $name): array => [
                'addon_name' => $name,
                'quantity' => $addons->sum('quantity'),
                'revenue' => $this->money($addons->sum(fn ($addon) => (float) $addon->line_total)),
            ])
            ->sortByDesc('quantity')
            ->take(5)
            ->values();

        $statuses = ['pending', 'confirmed', 'preparing', 'delivering', 'completed', 'cancelled'];

        return response()->json(['data' => [
            'period' => ['from' => $from->toIso8601String(), 'to' => $to->toIso8601String()],
            'summary' => [
                'total_orders' => $orders->count(),
                'paid_orders' => $paidOrders->count(),
                'unpaid_orders' => $activeOrders->where('payment_status', 'unpaid')->count(),
                'cancelled_orders' => $orders->where('order_status', 'cancelled')->count(),
                'total_revenue' => $this->money($paidRevenue),
                'average_order_value' => $this->money($paidOrders->count() ? $paidRevenue / $paidOrders->count() : 0),
            ],
            'orders_by_status' => collect($statuses)->mapWithKeys(fn (string $status): array => [$status => $orders->where('order_status', $status)->count()]),
            'daily' => $daily,
            'top_menu_items' => $topMenuItems,
            'top_addons' => $topAddons,
        ]]);
    }

    private function orderDate(Order $order): Carbon
    {
        return Carbon::parse($order->created_at ?? $order->ordered_at);
    }

    private function money(float $value): string
    {
        return number_format($value, 2, '.', '');
    }
}
