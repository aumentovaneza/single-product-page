<?php

namespace App\Service;

use App\Models\Payment;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

class PaymentService
{
    /**
     * Process payemnt
     * - Connect to the stripe API
     * - Create a record on DB
     * @param $data
     * @return bool|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function processPayment($data)
    {
        try {
            Stripe::setApiKey(getenv('STRIPE_SECRET'));

            Stripe::charges()->create([
                'amount'            => $data['amount'],
                'currency'          => $data['currency'],
                'source'            => $data['stripeToken'],
                'description'       => $data['description'],
                'receipt_email'     => $data['paymentDetails']['emailAddress'],
                'metadata'          => [
                    'data1' => 'metadata 1',
                    'data2' => 'metadata 2',
                    'data3' => 'metadata 3',
                ]
            ]);

            Payment::create([
                'product_id' => $data['id'],
                'amount'    => $data['amount'],
                'customer_name' => $this->formatName($data['paymentDetails']),
                'customer_address' => $this->formatAddress($data['paymentDetails']),
                'customer_email_address' => $data['paymentDetails']['emailAddress'],
                'isSuccessful' => true
            ]);

            return true;

        } catch (CardErrorException $e) {
            return response($e, 500);
        }
    }

    /**
     * Format name
     * @param $paymentDetails
     * @return string
     */
    private function formatName($paymentDetails)
    {
        return $paymentDetails['firstName'] . " " .  $paymentDetails['lastName'];
    }

    /**
     * Format address
     * @param $paymentDetails
     * @return string
     */
    private function formatAddress($paymentDetails)
    {
        return $paymentDetails['streetAddress'] . " " .
            $paymentDetails['state'] . ", " .
            $paymentDetails['city'] . ", " .
            $paymentDetails['country'] . ", " .
            $paymentDetails['zip'];
    }
}
