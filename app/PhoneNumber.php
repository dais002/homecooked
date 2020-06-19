<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    protected $fillable = ['number', 'owner_type', 'owner_id'];

    public function users()
    {
        return $this->morphedByMany(User::class, 'owner');
    }

    public function stores()
    {
        return $this->morphedByMany(Store::class, 'owner');
    }
}
