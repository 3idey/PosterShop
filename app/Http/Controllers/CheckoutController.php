<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;

class CheckoutController extends Controller
{
    public function show(Request $request)
    {
        // Routes already ensure auth; simply load the current cart
        $cart = app(CartController::class)->currentCart($request);
        if ($cart->items->isEmpty()) {
            return redirect()->route('cart.show')->with('success', 'Your cart is empty.');
        }
        return view('checkout.show', compact('cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shipping_name' => 'required|string|max:255',
            'shipping_phone' => 'required|string|max:30',
            'shipping_city' => 'required|string|max:100',
            'shipping_address' => 'required|string|max:255',
        ]);

        $user = $request->user();
        abort_unless($user, 403);

        $cart = app(CartController::class)->currentCart($request);
        if ($cart->items->isEmpty()) {
            return redirect()->route('cart.show')->with('success', 'Your cart is empty.');
        }

        $order = DB::transaction(function () use ($user, $cart, $request) {
            $order = Order::create([
                'user_id' => $user->id,
                'status' => 'paid', // assuming payment success
                'total' => $cart->total(),
                'shipping_name' => $request->input('shipping_name'),
                'shipping_phone' => $request->input('shipping_phone'),
                'shipping_city' => $request->input('shipping_city'),
                'shipping_address' => $request->input('shipping_address'),
            ]);

            foreach ($cart->items as $ci) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'poster_id' => $ci->poster_id,
                    'qty' => $ci->qty,
                    'price' => $ci->price,
                    'title_snapshot' => optional($ci->poster)->title,
                    'image_snapshot' => optional($ci->poster)->image,
                ]);
            }

            $cart->items()->delete();

            return $order;
        });

        session(['cart_count' => 0]);

        return redirect()->route('checkout.success', $order->id);
    }

    public function success(Request $request, $orderId)
    {
        $order = Order::with('items.poster')->findOrFail($orderId);
        abort_unless($request->user() && $order->user_id === $request->user()->id, 403);
        return view('checkout.success', compact('order'));
    }
}
