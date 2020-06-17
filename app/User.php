<?php

namespace App;

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

    // used to pull most recent cart that's not a completed order
    public function getCartAttribute()
    {
        // return $this->carts()->firstOrCreate([]);
        $cart = $this->carts()->whereNotIn('id', Order::all()->pluck('id'))->first();
        if (!$cart) {
            $cart = $this->carts()->create();
        };
        return $cart;
    }

    public function getCartTotalAttribute()
    {
        return $this->cart->items->pluck('pivot')->pluck('quantity')->sum();
    }

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

    // assign role to
    public function assignRole($role)
    {
        // add new records if necessary, don't drop anything
        $this->roles()->sync($role, false);
    }

    public function getRoleAttribute()
    {
        return $this->roles->pluck('name');
    }
}
