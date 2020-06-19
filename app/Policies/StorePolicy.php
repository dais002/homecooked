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
}
