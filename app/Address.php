<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['address_1', 'address_2', 'city', 'state', 'zip_code', 'owner_id', 'owner_type'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
