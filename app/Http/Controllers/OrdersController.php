<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::where('user_id', $request->user()->id)
            ->latest()->withCount('items')->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function show(Request $request, Order $order)
    {
        abort_unless($order->user_id === $request->user()->id, 403);
        $order->load('items.poster');
        return view('orders.show', compact('order'));
    }
}
