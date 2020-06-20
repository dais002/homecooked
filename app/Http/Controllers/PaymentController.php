<?php

namespace App\Http\Controllers;

use App\Plan;
use Illuminate\Http\Request;
use Laravel\Cashier\Billable;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        // this never runs when the axios.post request is triggered... but WHYYYYYY
        dd($request);

        $user = auth()->user();
        $paymentMethod = $request->payment_method;

        // plan ID could be 'standard' or API key
        $planId = 'price_1GwCl5IOPhNaXwPAjftecbYZ';
        // $planId = 'standard';

        $user->newSubscription('primary', $planId)
            ->create($paymentMethod);

        return 'Subscription Created';

        // $user = auth()->user();
        // $stripe = Stripe::make(env('STRIPE_SECRET')); // used Stripe secret key, not Publishable key
        // $charge = $stripe->charges()->create([
        //     'amount'   => 50,
        //     'currency' => 'USD',
        //     'source' => $request->stripeToken,
        //     'receipt_email' => $user->email,
        // ]);

        // return "Payment Created";


        // $user = $request->user();
        // $paymentMethodID = $request->payment_method;

        // if ($user->stripe_id == null) {
        //     $user->createAsStripeCustomer();
        // }

        // $user->addPaymentMethod($paymentMethodID);
        // $user->updateDefaultPaymentMethod($paymentMethodID);

        // return response()->json(null, 204);
    }
}
