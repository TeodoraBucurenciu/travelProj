<?php
namespace App\Billings\Gateways;

use App\Billings\PaymentGatewayInterface;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalGateway implements PaymentGatewayInterface
{

    public function process(Request $request)
    {
        setCurrency('EUR');
        $provider->getAccessToken();
        $data = [
            "intent"              => "CAPTURE",
            "purchase_units"      => [
                [
                    "amount" => [
                        "value"         => 100,
                        "currency_code" => getCurrencyCode(),
                    ],
                ],
            ],
            "application_context" => [
                "cancel_url" => route('user.paypal.failed'),
                "return_url" => route('user.paypal.success'),
            ],
        ];

        $order = $provider->createOrder($data);

        return redirect($order['links'][1]['href']);
    }

    public function failed()
    {
        dd('Your payment has been declend. The payment cancelation page goes here!');
    }

    public function success(Request $request)
    {
        $provider = new PayPal();      // To use express checkout.
        $provider->getAccessToken();
        $token = $request->get('token');

        $orderInfo = $provider->showOrderDetails($token);
        $response = $provider->capturePaymentOrder($token);

        dump($orderInfo);
        dd($response);
    }
}
