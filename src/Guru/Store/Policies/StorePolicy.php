<?php

namespace Guru\Store\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Guru\Store\Models\Store;

class StorePolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can view the store.
     *
     * @param User $user
     * @param Store $store
     *
     * @return bool
     */
    public function view(User $user, Store $store)
    {
        if ($user->canDo('store.store.view') && $user->is('admin')) {
            return true;
        }

        return $user->id === $store->user_id;
    }

    /**
     * Determine if the given user can create a store.
     *
     * @param User $user
     * @param Store $store
     *
     * @return bool
     */
    public function create(User $user)
    {
        return  $user->canDo('store.store.create');
    }

    /**
     * Determine if the given user can update the given store.
     *
     * @param User $user
     * @param Store $store
     *
     * @return bool
     */
    public function update(User $user, Store $store)
    {
        if ($user->canDo('store.store.update') && $user->is('admin')) {
            return true;
        }

        return $user->id === $store->user_id;
    }

    /**
     * Determine if the given user can delete the given store.
     *
     * @param User $user
     * @param Store $store
     *
     * @return bool
     */
    public function destroy(User $user, Store $store)
    {
        if ($user->canDo('store.store.delete') && $user->is('admin')) {
            return true;
        }

        return $user->id === $store->user_id;
    }

    /**
     * Determine if the user can perform a given action ve.
     *
     * @param [type] $user    [description]
     * @param [type] $ability [description]
     *
     * @return [type] [description]
     */
    public function before($user, $ability)
    {
        if ($user->isSuperUser()) {
            return true;
        }
    }
}
