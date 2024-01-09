<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function session(Request $request)
    {
        $activityItems = [];

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        foreach (session('cart') as $id => $details) {

            $activity_name = $details['name'];
            $total = $details['price'];
            $quantity = $details['quantity'];


            $unit_amount = intval($total * 100);

            $activityItems[] = [
                'price_data' => [
                    'currency'    => 'USD',
                    'unit_amount' => $unit_amount,
                    'product_data' => [
                        'name' => $activity_name,
                    ],
                ],
                'quantity' => $quantity,
            ];
        }

        $checkoutSession = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items'          => $activityItems, 
            'mode'                => 'payment',
            'success_url'         => route('success'), // Replace with your actual success URL
            'cancel_url'          => route('cancel'),  // Replace with your actual cancel URL
        ]);

        return redirect()->away($checkoutSession->url);
    }

    public function success()
    {
        return "Thanks for you order You have just completed your payment. The seeler will reach out to you as soon as possible";
    }

    public function cancel()
    {
        return view('cancel');
    }
}
