<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Requests\CartItemRequest;
use App\Item;
use Illuminate\Http\Request;

class CartItemController extends Controller
{

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'item_id' => 'exists:items,id|required|integer',
            'quantity' => 'required|integer',
        ]);

        $cart = auth()->user()->cart;
        $item = Item::find($attributes['item_id']);
        $quantity = $attributes['quantity'];

        $cart->items()->attach($item, ['quantity' => $quantity]);

        return back();
    }

    public function update($id, Request $request)
    {


        // in shopping cart actions
        // increase/decrease quantities
        // get cart-id, search for item-id, update from request
        // if user clicked delete cart item, is it a patch or destroy?
    }

    public function destroy($id)
    {
        //
    }
}
