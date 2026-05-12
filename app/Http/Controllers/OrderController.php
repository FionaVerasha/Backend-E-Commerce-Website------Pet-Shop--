<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\Webhook;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function process(Request $request)
    {
        $cart = session()->get('cart');
        $address = session()->get('checkout_address');
        $paymentMethod = $request->input('payment'); // 'cod', 'payhere' (stripe), 'bank_deposit'

        if (!$cart || !$address) {
            return redirect()->route('cart.index')->with('error', 'Your cart or address information is missing.');
        }

        $totalPrice = $this->calculateTotal($cart);

        // 1. Create a "Pending" Order in Database
        $order = Order::create([
            'user_id' => auth()->id(),
            'order_number' => 'WC-' . strtoupper(uniqid()),
            'address' => $address,
            'cart_items' => $cart,
            'total_amount' => $totalPrice,
            'payment_method' => $paymentMethod,
            'payment_status' => 'pending',
        ]);

        // 2. Handle Cash on Delivery (COD) Flow
        if ($paymentMethod === 'cod') {
            session()->forget(['cart', 'checkout_address']);
            return redirect()->route('checkout.success')->with('success', 'Your order has been placed successfully via Cash on Delivery!');
        }

        // 3. Handle Stripe Payment Flow
        if ($paymentMethod === 'payhere') {
            Stripe::setApiKey(config('services.stripe.secret'));

            $checkoutSession = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'lkr',
                            'product_data' => [
                                'name' => 'Whisker Cart Order #' . $order->order_number,
                                'description' => 'Premium Pet Supplies Purchase',
                            ],
                            'unit_amount' => $totalPrice * 100, // Stripe expects amount in cents
                        ],
                        'quantity' => 1,
                    ]
                ],
                'mode' => 'payment',
                'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('checkout.cancel'),
                'metadata' => [
                    'order_id' => $order->id,
                ],
            ]);

            $order->update(['stripe_session_id' => $checkoutSession->id]);

            return redirect($checkoutSession->url);
        }

        // 4. Handle Bank Deposit
        if ($paymentMethod === 'bank_deposit') {
            session()->forget(['cart', 'checkout_address']);
            return redirect()->route('checkout.success')->with('success', 'Your order has been placed. Please complete the bank transfer to finalize.');
        }

        return redirect()->back()->with('error', 'Invalid payment method selected.');
    }

    public function success(Request $request)
    {
        // If we have a session_id, we can verify it, but usually the webhook handles the 'paid' status
        if ($request->has('session_id')) {
            session()->forget(['cart', 'checkout_address']);
        }

        return view('checkout-success');
    }

    public function cancel()
    {
        return view('checkout-cancel');
    }

    public function webhook(Request $request)
    {
        $payload = $request->getContent();
        $sig_header = $request->header('Stripe-Signature');
        $endpoint_secret = config('services.stripe.webhook_secret');

        try {
            $event = Webhook::constructEvent(
                $payload,
                $sig_header,
                $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            return response()->json(['error' => 'Invalid payload'], 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        // Handle the event
        if ($event->type == 'checkout.session.completed') {
            $session = $event->data->object;
            $orderId = $session->metadata->order_id;

            $order = Order::find($orderId);
            if ($order) {
                $order->update(['payment_status' => 'paid']);
                Log::info('Order marked as PAID: ' . $order->order_number);
            }
        }

        return response()->json(['status' => 'success']);
    }

    private function calculateTotal($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
}
