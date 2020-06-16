<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $items = auth()->user()->cart->items;

        return view('cart.index', [
            'items' => $items,
        ]);
    }
}
