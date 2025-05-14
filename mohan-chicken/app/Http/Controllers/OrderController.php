<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderItems.menuItem')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $menuItems = MenuItem::all();
        return view('orders.create', compact('menuItems'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'menu_item_ids' => 'required|array',
            'menu_item_ids.*' => 'exists:menu_items,id',
            // 'quantities' => 'required',
            // 'quantities.*' => 'integer|min:1',
        ]);

        $order = Order::create([
            // 'user_id' => Auth::id(),
            'total_amount' => 0, // will update below
            'status' => 'pending',
        ]);

        $total = 0;
        foreach ($validated['menu_item_ids'] as $menuItemId) {
            $menuItem = MenuItem::find($menuItemId);
            $qty = $validated['quantities'][$menuItemId] ?? 1; // default to 1 if not set
            $total += $menuItem->price * $qty;
        
            OrderItem::create([
                'order_id' => $order->id,
                'menu_item_id' => $menuItem->id,
                'quantity' => $qty,
                'price' => $menuItem->price,
            ]);
        }
        
        $order->update(['total_amount' => $total]);

        return redirect()->route('orders.index')->with('success', 'Order placed!');
    }

    public function show(Order $order)
    {
        $order->load('orderItems.menuItem');
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        // Usually, orders are not edited, but you can implement if needed
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        // Implement if you want to allow updating order status, etc.
        $validated = $request->validate([
            'status' => 'required|string',
        ]);
        $order->update($validated);
        return redirect()->route('orders.index')->with('success', 'Order updated!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted!');
    }
}
