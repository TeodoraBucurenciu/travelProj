<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

use Stripe\PaymentIntent;
use Stripe\Exception\CardException;
use Stripe\Stripe;



class PaymentController extends Controller
{
    public function show()
    {
        // Retrieve cart items and total price
        $cartItems = CartItem::all(); // Adjust this based on your model
        $totalPrice = $this->calculateTotal($cartItems);

        return view('process-payment.show', compact('cartItems', 'totalPrice'));
    }

    public function confirmation(Request $request)
{
    // Retrieve order details from the request
    $orderNumber = $request->input('orderNumber');
    $orderTotal = $request->input('orderTotal');
    $email = $request->input('email');

    // Return the confirmation view with order details
    return view('process-payment-confirmation', compact('orderNumber', 'orderTotal', 'email'));
}
    public function processPayment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

    try {
        $cartItems = CartItem::all(); // Replace with your logic to get cart items

        $orderNumber = '12345';
        $orderTotal = 50.00;
        $email = 'user@example.com';

        // Adjust the amount based on your logic
        $amount = 1000; // Example: $10.00 in cents

        $intent = \Stripe\PaymentIntent::create([
            'amount' => $amount,
            'currency' => 'usd', // Change 'usd' to your currency code
        ]);

        // Redirect to the confirmation page with order details
        return redirect()->route('confirmation.page', [
            'orderNumber' => $orderNumber,
            'orderTotal' => $orderTotal,
            'email' => $email,
        ]);
    } catch (CardException $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
    }

    
    private function calculateTotal($cartItems)
    {
        $totalPrice = 0;

        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem->calculateTotal(); // Assuming you have a calculateTotal method in your model
        }

        return $totalPrice;
    }
}
