<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $name = $request->input('name');
        $price = $request->input('price');
        $image = $request->input('image');
        $quantity = $request->input('quantity', 1);

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                "name" => $name,
                "quantity" => $quantity,
                "price" => $price,
                "image" => $image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Product removed successfully');
        }
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                $cart[$request->id]["quantity"] = max(1, $request->quantity);
                session()->put('cart', $cart);
                return response()->json(['success' => true]);
            }
        }
        return response()->json(['success' => false], 400);
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        $address = session()->get('checkout_address', []);

        if (empty($cart)) {
            return redirect()->route('shop')->with('error', 'Your cart is empty! Add some premium products first.');
        }

        return view('checkout', compact('cart', 'address'));
    }

    public function storeAddress(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:255',
            'zip' => 'required|string|max:20',
        ]);

        session()->put('checkout_address', $validated);
        session()->put('same_address', $request->has('same_address'));

        return redirect()->route('checkout.confirm');
    }

    public function confirm()
    {
        $cart = session()->get('cart', []);
        $address = session()->get('checkout_address');

        if (empty($cart)) {
            return redirect()->route('shop');
        }

        if (empty($address)) {
            return redirect()->route('checkout')->with('error', 'Please provide your shipping address first.');
        }

        return view('confirm-order', compact('cart', 'address'));
    }
}
