<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Item;

class CartItemController extends Controller
{

    public function store()
    {
        $attributes = request()->validate([
            'item_id' => 'exists:items,id|required|integer',
            'quantity' => 'required|integer',
        ]);

        $cart = auth()->user()->cart;
        $item = Item::find($attributes['item_id']);
        $quantity = $attributes['quantity'];

        $hasItem = $cart->items->contains($item->id);

        if (!$hasItem) {
            // update item limit on items table
            $item->limit -= $quantity;
            $item->save();

            // create new cart-item
            $cart->items()->attach($item, ['quantity' => $quantity]);
        } else {
            // update item limit on items table
            $item->limit -= $quantity;
            $item->save();

            // update quantity remaining
            $previousQuantity = $cart->items()->find($item)->pivot->quantity;
            $quantity += $previousQuantity;

            $cart->items()->updateExistingPivot($item, ['quantity' => $quantity]);
        }

        return back();
    }

    public function update(Cart $cart)
    {
        // --------- need refactoring ----------
        // shouldn't have to pass in item_id as its in the route path, but how do i grab it?
        $attributes = request()->validate([
            'item_id' => 'required|integer|exists:items,id',
            'action' => 'required|string'
        ]);

        $item = $cart->items()->find($attributes['item_id']);
        $quantity = $item->pivot->quantity;
        $action = $attributes['action'];

        // edge case to not exceed available items
        if ($item->limit !== 0 || $quantity === 1) return back();

        if ($action === 'increase') {
            $item->limit -= 1;
            $quantity += 1;
        } else {
            $item->limit += 1;
            $quantity -= 1;
        }

        $item->save();

        $cart->items()->updateExistingPivot($item, ['quantity' => $quantity]);

        return back();
    }

    public function destroy(Cart $cart)
    {
        $attribute = request()->validate([
            'item_id' => 'required|integer|exists:items,id',
        ]);

        $item = $cart->items()->find($attribute['item_id']);
        $quantity = $item->pivot->quantity;

        $item->limit += $quantity;
        $item->save();

        $cart->items()->detach($attribute['item_id']);

        return back();
    }
}
