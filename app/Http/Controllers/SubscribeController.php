<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Cashier\Billable;

class SubscribeController extends Controller
{

    public function index()
    {
        return view('subscribe.index', [
            'intent' => auth()->user()->createSetupIntent(),
        ]);
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $paymentMethod = $request->payment_method;

        $planId = 'price_1GwCl5IOPhNaXwPAjftecbYZ';

        $user->newSubscription('primary', $planId)
            ->create($paymentMethod);

        return 'success!';

        // route isnt redirecting probably due to API call?
        return redirect()->route('stores.create')->with('success', 'Subscription received. Proceed to creating your store!');

        // $user = auth()->user();
        // $stripe = Stripe::make(env('STRIPE_SECRET')); // used Stripe secret key, not Publishable key
        // $charge = $stripe->charges()->create([
        //     'amount'   => 50,
        //     'currency' => 'USD',
        //     'source' => $request->stripeToken,
        //     'receipt_email' => $user->email,
        // ]);

        // return "Payment Created";


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
