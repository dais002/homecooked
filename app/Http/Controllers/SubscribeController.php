<?php

namespace App\Http\Controllers;

use App\Events\Subscribed;
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

        $user->newSubscription('standard', $planId)
            ->create($paymentMethod);

        return 'success';
    }
}
