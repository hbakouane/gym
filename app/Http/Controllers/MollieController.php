<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mollie\Laravel\Facades\Mollie;

class MollieController extends Controller
{
    public function  __construct() {
        Mollie::api()->setApiKey('test_hqaBJBAWthMVBCfQc4TRkhcRTfMEjH');
    }

    public function preparePayment()
    {
        $order_id = Str::random(16);
        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => "10.00" // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            "description" => "Order #12345",
            "redirectUrl" => route('order.success', ['order_id' => $order_id]),
            "metadata" => [
                "order_id" => $order_id,
            ],
        ]);

        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }

    /**
     * After the customer has completed the transaction,
     * you can fetch, check and process the payment.
     * This logic typically goes into the controller handling the inbound webhook request.
     * See the webhook docs in /docs and on mollie.com for more information.
     */
    public function paymentSuccess()
    {
        echo "success";
    }
}
