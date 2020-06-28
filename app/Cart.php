<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class)->withPivot("quantity")->withTimestamps();
    }

    public function getCartTotalAttribute()
    {
        return $this->items->pluck('pivot')->pluck('quantity')->sum();
    }

    public function getOrderTotalAttribute()
    {
        return $this->items->sum(function ($item) {
            return $item->price * $item->pivot->quantity;
        });
    }
}
