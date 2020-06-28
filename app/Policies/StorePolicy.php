<?php

namespace App\Policies;

use App\Store;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StorePolicy
{
    use HandlesAuthorization;

    public function addItem(User $user, Store $store)
    {
        return $user->stores->contains($store) || $user->role === 'manager';
    }

    public function addStore(User $user)
    {
        return $user->subscribed('standard') && $user->stores->count() < 1;
    }
}
