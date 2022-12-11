<?php

namespace App\Policies;

use App\Models\Brand;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BrandPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
       return $user->hasPermission('Brand_viewAny');
       //
    }


    public function view(User $user)
    {
        return $user->hasPermission('Brand_view');
        //
    }


    public function create(User $user)
    {
        //
        return $user->hasPermission('Brand_create');
    }


    public function update(User $user)
    {
        return $user->hasPermission('Brand_update');
        //
    }

    public function delete(User $user)
    {
        return $user->hasPermission('Brand_delete');
        //
    }


    public function restore(User $user)
    {
       return $user->hasPermission('Brand_restore');
       //
    }


    public function forceDelete(User $user)
    {
        return $user->hasPermission('Brand_forceDelete');
        //
    }

    public function viewtrash(User $user)
    {
        return $user->hasPermission('Brand_viewtrash');
        //
    }
}
