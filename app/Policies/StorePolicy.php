<?php

namespace App\Policies;

use App\Store;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StorePolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->role === 'manager') {
            return true;
        }
    }

    public function addItem(User $user, Store $store)
    {
        return $user->stores->contains($store);
    }

    public function addStore(User $user)
    {
        // refactor - basically want to say subscribed, and doesn't already have a store.
        return $user->subscribed('primary') && $user->stores->first() !== null;
    }
}
