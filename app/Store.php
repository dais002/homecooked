<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Store extends Model
{

    use Searchable;

    protected $fillable = ['name', 'description', 'logo'];

    // public function searchableAs()
    // {
    //     return config('scout.prefix') . 'store';
    // }

    public function toSearchableArray()
    {
        $this->items;

        $array = $this->toArray();

        // Applies Scout Extended default transformations:
        $array = $this->transform($array);

        // Add an extra attribute:
        // $array['item_name'] = $this->items->name

        return $array;
    }

    // public function shouldBeSearchable()
    // {
    //     return $this->isPublished();
    // }

    public function users()
    {
        return $this->belongsToMany(User::class);
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
        return $this->morphOne('App\Address', 'owner');
    }

    public function phone_number()
    {
        return $this->morphOne(PhoneNumber::class, 'owner');
    }
}
