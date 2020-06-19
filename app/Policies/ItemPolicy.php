<?php

namespace App\Policies;

use App\Item;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->role === 'manager') {
            return true;
        }
    }

    public function update(User $user, Item $item)
    {
        return $item->store->users()->pluck('user_id')->contains($user->id);
    }

    public function delete(User $user, Item $item)
    {
        return $item->store->users()->pluck('user_id')->contains($user->id);
    }
}
