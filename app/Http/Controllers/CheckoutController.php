<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Cart::with('items.product')->where('user_id', Auth::id())->first();
        $total = 0;
        if (!$cart || $cart->items->count() === 0) {

        return redirect()->route('cart.index')->with('error', 'Cart is empty');
        }
        foreach ($cart->items as $item){
            $total += $item->product->price * $item->quantity;
        }
        return view('checkout.index', compact('cart', 'total'));
    }
    public function process(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:bank_transfer,ewallet,cod'
        ]);
        $cart = Cart::with('items.product')
            ->where('user_id', Auth::id())->first();
        if (!$cart || $cart->items->count() === 0) {
            return back()->with('error', 'Cart is empty');
        }
        $total = 0;
        foreach ($cart->items as $item) {
            $total += $item->quantity * $item->product->price;
        }
        // CREATE ORDER
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $total,
            'status' => 'pending',
            'payment_method' => $request->payment_method,
        ]);
        // CREATE ORDER ITEMS
        foreach ($cart->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
            // REDUCE STOCK
            $product = $item->product;
            $product->decrement('stock', $item->quantity);
        }
        // CREATE PAYMENT
        Payment::create([
            'order_id' => $order->id,
            'payment_status' => 'pending',
            'payment_reference' => strtoupper(
                Str::random(10)
            ),
        ]);
        // CLEAR CART
        $cart->items()->delete();
        return redirect()
            ->route('orders.index')
            ->with('success', 'Checkout successful');
    }
    public function orders()
    {
        $orders = Order::with('items.product')->where('user_id', Auth::id())->latest()->get();
        return view('orders.index', compact('orders'));
    }
    public function show(Order $order)
    {
        if ($order->user_id !== Auth::id()) {abort(403);}
        $order->load('items.product', 'payment');
        return view('orders.show', compact('order'));
    }
}
