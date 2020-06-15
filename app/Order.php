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

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function phone_number()
    {
        return $this->hasOne(PhoneNumber::class);
    }
}
