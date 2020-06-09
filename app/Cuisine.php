<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{

    protected $fillable = ['type'];

    public function store()
    {
        return $this->hasMany(Store::class);
    }
}
