<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['name', 'logo'];

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
}
