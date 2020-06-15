<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = ['name', 'label'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function assignUserToRole($user)
    {
        return $this->users->sync($user, false);
    }
}
