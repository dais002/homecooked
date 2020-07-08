<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Mail\ChefConfirm;
use App\Mail\CustomerConfirm;
use App\Order;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{

    public function index()
    {
        return view('order.index');
    }

    public function store()
    {
        $attributes = request()->validate([
            'cart' => 'required|integer|exists:carts,id',
        ]);

        Order::create([
            'cart_id' => $attributes['cart'],
            'address_id' => 1,
            'phone_number_id' => 1,
        ]);

        // send email to the store owners
        Cart::find($attributes['cart'])
            ->items->each(function ($item) {
                Mail::to($item->store->users->first()->email)->send(new ChefConfirm($item, auth()->user()));
            });

        // send email to user
        Mail::to(auth()->user()->email)->send(new CustomerConfirm());

        return redirect()->route('order.index');
    }
}
