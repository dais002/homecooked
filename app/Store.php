<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Store extends Model
{

    use Searchable;

    protected $fillable = ['name', 'description', 'logo'];

    public function toSearchableArray()
    {
        $this->items;

        $array = $this->toArray();

        // Applies Scout Extended default transformations:
        $array = $this->transform($array);

        return $array;
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function assignUserToStore($user)
    {
        return $this->users()->sync($user, false);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function address()
    {
        return $this->morphMany('App\Address', 'owner');
    }

    public function phone_number()
    {
        return $this->morphMany(PhoneNumber::class, 'owner');
    }

    // storing logo's locally
    // public function getLogoAttribute($link)
    // {
    //     if ($link) {
    //         return asset('storage/' . $link);
    //     } else {
    //         return 'https://lorempixel.com/360/280/?39851';
    //     }
    // }
}
