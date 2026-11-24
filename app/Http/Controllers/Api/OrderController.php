<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Addon;
use App\Models\MenuItem;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'customer_name' => ['required', 'string', 'max:120'],
            'customer_address' => ['required', 'string', 'max:2000'],
            'customer_phone' => ['required', 'string', 'max:30'],
            'delivery_notes' => ['nullable', 'string', 'max:1000'],
            'payment_method' => ['required', 'in:qris,cod'],
            'items' => ['required', 'array', 'min:1', 'max:50'],
            'items.*.menu_item_id' => ['required', 'integer', 'distinct', 'exists:menu_items,id'],
            'items.*.quantity' => ['required', 'integer', 'min:1', 'max:99'],
            'items.*.item_note' => ['nullable', 'string', 'max:500'],
            'items.*.addons' => ['sometimes', 'array', 'max:20'],
            'items.*.addons.*.addon_id' => ['required', 'integer', 'distinct', 'exists:addons,id'],
            'items.*.addons.*.quantity' => ['required', 'integer', 'min:1', 'max:99'],
        ]);

        $order = DB::transaction(function () use ($data): Order {
            $preparedItems = [];
            $menuSubtotal = 0;
            $addonSubtotal = 0;

            foreach ($data['items'] as $itemData) {
                $item = MenuItem::with(['addons' => fn ($query) => $query->where('is_available', true)])
                    ->whereKey($itemData['menu_item_id'])->where('is_available', true)->firstOrFail();
                if ($item->available_day && strcasecmp($item->available_day, now()->format('l')) !== 0) {
                    abort(422, "Menu {$item->name} hanya tersedia pada hari {$item->available_day}.");
                }

                $menuLineTotal = (float) $item->price * $itemData['quantity'];
                $itemTotal = $menuLineTotal;
                $preparedAddons = [];
                foreach ($itemData['addons'] ?? [] as $addonData) {
                    $addon = $item->addons->firstWhere('id', $addonData['addon_id']);
                    if (! $addon) {
                        abort(422, "Additional tidak tersedia untuk menu {$item->name}.");
                    }
                    $addonLineTotal = (float) $addon->price * $addonData['quantity'] * $itemData['quantity'];
                    $addonSubtotal += $addonLineTotal;
                    $itemTotal += $addonLineTotal;
                    $preparedAddons[] = ['addon' => $addon, 'quantity' => $addonData['quantity'], 'line_total' => $addonLineTotal];
                }
                $menuSubtotal += $menuLineTotal;
                $preparedItems[] = ['item' => $item, 'data' => $itemData, 'addons' => $preparedAddons, 'line_total' => $itemTotal];
            }

            $orderAttributes = [
                'order_number' => 'WJ-'.now()->format('ymd').'-'.Str::upper(Str::random(8)),
                'customer_name' => $data['customer_name'],
                'customer_address' => $data['customer_address'],
                'customer_phone' => $data['customer_phone'],
                'delivery_notes' => $data['delivery_notes'] ?? null,
                'payment_method' => $data['payment_method'],
            ];
            if (Schema::hasColumn('orders', 'subtotal')) {
                $orderAttributes['subtotal'] = $menuSubtotal + $addonSubtotal;
            } else {
                $orderAttributes['menu_subtotal'] = $menuSubtotal;
                $orderAttributes['addon_subtotal'] = $addonSubtotal;
            }
            $orderAttributes[Schema::hasColumn('orders', 'total') ? 'total' : 'grand_total'] = $menuSubtotal + $addonSubtotal;
            $order = Order::create($orderAttributes);

            foreach ($preparedItems as $prepared) {
                $item = $prepared['item'];
                $dataItem = $prepared['data'];
                $orderItemAttributes = [
                    'menu_item_id' => $item->id,
                    'unit_price' => $item->price,
                    'quantity' => $dataItem['quantity'],
                    'item_note' => $dataItem['item_note'] ?? null,
                ];
                if (Schema::hasColumn('order_items', 'item_name')) {
                    $orderItemAttributes['item_name'] = $item->name;
                }
                $orderItemAttributes[Schema::hasColumn('order_items', 'line_total') ? 'line_total' : 'subtotal'] = $prepared['line_total'];
                $orderItem = $order->items()->create($orderItemAttributes);
                foreach ($prepared['addons'] as $preparedAddon) {
                    /** @var Addon $addon */
                    $addon = $preparedAddon['addon'];
                    $addonAttributes = [
                        'addon_id' => $addon->id,
                        'unit_price' => $addon->price,
                        'quantity' => $preparedAddon['quantity'],
                    ];
                    if (Schema::hasColumn('order_item_addons', 'addon_name')) {
                        $addonAttributes['addon_name'] = $addon->name;
                    }
                    $addonAttributes[Schema::hasColumn('order_item_addons', 'line_total') ? 'line_total' : 'subtotal'] = $preparedAddon['line_total'];
                    $orderItem->addons()->create($addonAttributes);
                }
            }

            return $order->load('items.menuItem', 'items.addons.addon');
        });

        return response()->json(['data' => $order], 201);
    }

    public function track(Request $request): JsonResponse
    {
        $data = $request->validate([
            'order_number' => ['required', 'string', 'max:40'],
        ]);

        $order = Order::with(['items.menuItem', 'items.addons.addon'])
            ->where('order_number', $data['order_number'])
            ->first();

        if (! $order) {
            return response()->json(['message' => 'Pesanan tidak ditemukan.'], 404);
        }

        return response()->json(['data' => [
            'order_number' => $order->order_number,
            'order_status' => $order->order_status,
            'payment_status' => $order->payment_status,
            'payment_method' => $order->payment_method,
            'ordered_at' => $order->created_at?->toIso8601String() ?? $order->ordered_at,
            'customer_name' => $order->customer_name,
            'items' => $order->items->map(fn ($item) => [
                'item_name' => $item->item_name,
                'quantity' => $item->quantity,
                'unit_price' => $item->unit_price,
                'line_total' => $item->line_total,
                'item_note' => $item->item_note,
                'addons' => $item->addons->map(fn ($addon) => [
                    'addon_name' => $addon->addon_name,
                    'quantity' => $addon->quantity,
                    'unit_price' => $addon->unit_price,
                    'line_total' => $addon->line_total,
                ])->values(),
            ])->values(),
            'subtotal' => $order->subtotal,
            'total' => $order->total,
        ]]);
    }

    public function index(Request $request): JsonResponse
    {
        $filters = $request->validate([
            'order_status' => ['sometimes', 'in:pending,confirmed,preparing,delivering,completed,cancelled'],
            'payment_status' => ['sometimes', 'in:unpaid,paid'],
            'per_page' => ['sometimes', 'integer', 'min:1', 'max:100'],
        ]);
        $latestColumn = Schema::hasColumn('orders', 'created_at') ? 'created_at' : 'ordered_at';
        $orders = Order::with('items.menuItem', 'items.addons.addon', 'handler:id,name')
            ->when($filters['order_status'] ?? null, fn ($query, $status) => $query->where('order_status', $status))
            ->when($filters['payment_status'] ?? null, fn ($query, $status) => $query->where('payment_status', $status))
            ->latest($latestColumn)->paginate($filters['per_page'] ?? 20);

        return response()->json($orders);
    }

    public function update(Request $request, Order $order): JsonResponse
    {
        $data = $request->validate([
            'order_status' => ['sometimes', 'in:pending,confirmed,preparing,delivering,completed,cancelled'],
            'payment_status' => ['sometimes', 'in:unpaid,paid'],
        ]);
        abort_if($data === [], 422, 'Minimal satu status harus diperbarui.');
        $order->update([...$data, 'handled_by' => $request->user()->id]);

        return response()->json(['data' => $order->fresh(['items.menuItem', 'items.addons.addon', 'handler:id,name'])]);
    }

    public function show(Order $order): JsonResponse
    {
        return response()->json(['data' => $order->load('items.menuItem', 'items.addons.addon', 'handler:id,name')]);
    }

    public function uploadPaymentProof(Request $request, Order $order): JsonResponse
    {
        $data = $request->validate([
            'payment_proof' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        if ($order->payment_proof_path) {
            Storage::disk('public')->delete($order->payment_proof_path);
        }

        $path = $data['payment_proof']->store('payment-proofs', 'public');
        $order->update(['payment_proof_path' => $path]);

        return response()->json(['data' => [
            'payment_proof_path' => $path,
            'payment_proof_url' => Storage::disk('public')->url($path),
            'order' => $order->fresh(['items.menuItem', 'items.addons.addon', 'handler:id,name']),
        ]]);
    }
}
