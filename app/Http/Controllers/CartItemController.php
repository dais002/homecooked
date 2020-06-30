<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Events\AddToCart;
use App\Http\Requests\CartItemRequest;
use App\Item;

class CartItemController extends Controller
{

    public function update(Cart $cart, Item $item, CartItemRequest $request)
    {
        $request->validated();
        $quantity = $request->quantity;
        $user = auth()->user();

        $hasItem = $cart->items->contains($item->id);

        if ($hasItem) {
            if ($item->limit - $quantity < 0) return back();
            $previousQuantity = $cart->items->find($item->id)->pivot->quantity;

            $item->limit -= $quantity;
            $item->save();

            $quantity += $previousQuantity;

            if ($quantity === 0) {
                $cart->items()->detach($item->id);
            } else {
                $cart->items()->updateExistingPivot($item, ['quantity' => $quantity]);
            }
        } else {
            $item->limit -= $quantity;
            $item->save();

            $cart->items()->attach($item, ['quantity' => $quantity]);

            event(new AddToCart($item));
        }
        return back();
    }
}
