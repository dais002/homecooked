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
    }
}
