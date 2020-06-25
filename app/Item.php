<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Item extends Model
{

    use Searchable;

    protected $fillable = ['name', 'description', 'price', 'image', 'limit'];

    protected $touches = ['store'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class)->withTimestamps();
    }
}
