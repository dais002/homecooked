<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    public function store()
    {
        return $this->hasMany(Store::class);
    }
}
