<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    protected $fillable = ['number', 'owner_type', 'owner_id'];

    public function owner()
    {
        return $this->morphTo();
    }
}
