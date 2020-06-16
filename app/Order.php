<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $guarded = [];

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
}
