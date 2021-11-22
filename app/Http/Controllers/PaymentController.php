<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Service\PaymentService;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;

class PaymentController extends Controller
{
    private $payment;

    /**
     * @param PaymentService $service
     */
    public function __construct(PaymentService $service)
    {
        $this->payment = $service;
    }

    /**
     * Process payment
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $paymentStatus = $this->payment->processPayment($request->all());

        if($paymentStatus) {
            return response('Payment Success');
        } else {
            return response('Payment Failure');
        }

    }
}
