<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $fillable = ['name', 'description', 'price', 'image', 'limit'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class)->withTimestamps();
    }
}
