<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function stores()
    {
        return $this->belongsToMany(Store::class);
    }

    public function assignStore($store)
    {
        $this->stores()->sync($store, false);
    }

    public function storeName()
    {
        return $this->stores->map(function ($store) {
            return $store->name;
        });
    }

    // gravatar attribute
    public function getGravatarAttribute()
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return 'http://gravatar.com/avatar/' . $hash;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    // assign role to user
    public function assignRole($role)
    {
        // add new records if necessary, don't drop anything
        $this->roles()->sync($role, false);
    }

    public function roleName()
    {
        return $this->roles->map(function ($role) {
            return $role->name;
        });
    }
}
