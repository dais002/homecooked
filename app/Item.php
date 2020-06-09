<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $fillable = ['name', 'description', 'price', 'image', 'limit', 'store_id'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
