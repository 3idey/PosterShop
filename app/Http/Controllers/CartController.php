<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CartController extends Controller
{
    // Made public so other controllers (e.g., CheckoutController) can reuse it safely
    public function currentCart(Request $request): \App\Models\Cart
    {
        $sessionId = $request->session()->getId();
        $user = $request->user();

        $sessionCart = \App\Models\Cart::where('session_id', $sessionId)->first();

        if ($user) {
            // Prefer user's cart
            $userCart = \App\Models\Cart::firstOrCreate(['user_id' => $user->id]);

            // If there is a separate session cart, merge it into the user cart
            if ($sessionCart && $sessionCart->id !== $userCart->id) {
                $sessionCart->load('items');
                foreach ($sessionCart->items as $sItem) {
                    $item = $userCart->items()->firstOrNew(['poster_id' => $sItem->poster_id]);
                    if (!$item->exists) {
                        $item->qty = 0;
                        $item->price = $sItem->price; // snapshot
                    }
                    $item->qty += $sItem->qty;
                    $item->save();
                }
                // Clear and remove the session cart to free the unique session_id
                $sessionCart->items()->delete();
                $sessionCart->delete();
            }

            // Ensure the user cart has the current session id if not set
            if (!$userCart->session_id) {
                $userCart->session_id = $sessionId;
                $userCart->save();
            }

            $userCart = $userCart->load('items.poster');
            $this->updateCartCountSession($userCart);
            return $userCart;
        }

        // Guest: use or create by session
        if (!$sessionCart) {
            $sessionCart = \App\Models\Cart::create(['session_id' => $sessionId]);
        }
        return $sessionCart->load('items.poster');
    }

    private function updateCartCountSession(\App\Models\Cart $cart): void
    {
        $count = (int) $cart->items->sum('qty');
        session(['cart_count' => $count]);
    }

    public function show(Request $request)
    {
        $cart = $this->currentCart($request);
        $total = $cart->total();
        return view('cart.show', compact('cart', 'total'));
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'slug' => 'nullable|string|exists:posters,slug',
            'poster_id' => 'nullable|integer|exists:posters,id',
            'qty' => 'nullable|integer|min:1',
        ]);

        if (empty($data['slug']) && empty($data['poster_id'])) {
            return back()->with('success', 'Unable to add item: missing poster identifier.');
        }

        $qty = $data['qty'] ?? 1;
        $poster = isset($data['poster_id'])
            ? \App\Models\Poster::findOrFail($data['poster_id'])
            : \App\Models\Poster::where('slug', $data['slug'])->firstOrFail();

        $cart = $this->currentCart($request);

        $item = $cart->items()->firstOrNew(['poster_id' => $poster->id]);
        if (!$item->exists) {
            $item->qty = 0;
            $item->price = $poster->price; // snapshot
        }
        $item->qty += $qty;
        $item->save();

        $cart->refresh()->load('items');
        $this->updateCartCountSession($cart);

        return back()->with('success', 'Added to cart');
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'poster_id' => 'required|integer|exists:posters,id',
            'qty' => 'required|integer|min:1',
        ]);

        $cart = $this->currentCart($request);
        $item = $cart->items()->where('poster_id', $data['poster_id'])->first();
        if (!$item) {
            return back()->with('success', 'Item not found in cart');
        }
        $item->qty = $data['qty'];
        $item->save();

        $cart->refresh()->load('items');
        $this->updateCartCountSession($cart);

        return back()->with('success', 'Cart updated');
    }

    public function remove(Request $request)
    {
        $data = $request->validate([
            'poster_id' => 'required|integer|exists:posters,id',
        ]);

        $cart = $this->currentCart($request);
        $cart->items()->where('poster_id', $data['poster_id'])->delete();

        $cart->refresh()->load('items');
        $this->updateCartCountSession($cart);

        return back()->with('success', 'Item removed');
    }

    public function clear(Request $request)
    {
        $cart = $this->currentCart($request);
        $cart->items()->delete();
        $this->updateCartCountSession($cart->load('items'));
        return back()->with('success', 'Cart cleared');
    }
}
