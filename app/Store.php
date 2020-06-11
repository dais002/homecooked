<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['name', 'logo', 'cuisine_id'];

    public function cuisine()
    {
        return $this->belongsTo(Cuisine::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function getCuisineTypeAttribute()
    {
        return $this->cuisine->type;
    }

    // public function getRouteKeyName()
    // {
    //     return 'name';
    // }
}
