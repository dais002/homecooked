<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use Illuminate\Http\Request;

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

        return redirect()->route('order.index');
    }
}
