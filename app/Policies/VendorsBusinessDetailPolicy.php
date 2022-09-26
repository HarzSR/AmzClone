<?php

namespace App\Policies;

use App\Models\Admin\User;
use App\Models\Admin\VendorsBusinessDetail;
use Illuminate\Auth\Access\HandlesAuthorization;

class VendorsBusinessDetailPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Admin\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Admin\VendorsBusinessDetail  $vendorsBusinessDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, VendorsBusinessDetail $vendorsBusinessDetail)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Admin\VendorsBusinessDetail  $vendorsBusinessDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, VendorsBusinessDetail $vendorsBusinessDetail)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Admin\VendorsBusinessDetail  $vendorsBusinessDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, VendorsBusinessDetail $vendorsBusinessDetail)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Admin\VendorsBusinessDetail  $vendorsBusinessDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, VendorsBusinessDetail $vendorsBusinessDetail)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Admin\VendorsBusinessDetail  $vendorsBusinessDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, VendorsBusinessDetail $vendorsBusinessDetail)
    {
        //
    }
}
