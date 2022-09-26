<?php

namespace App\Policies;

use App\Models\Admin\User;
use App\Models\Admin\VendorsBankDetail;
use Illuminate\Auth\Access\HandlesAuthorization;

class VendorsBankDetailPolicy
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
     * @param  \App\Models\Admin\VendorsBankDetail  $vendorsBankDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, VendorsBankDetail $vendorsBankDetail)
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
     * @param  \App\Models\Admin\VendorsBankDetail  $vendorsBankDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, VendorsBankDetail $vendorsBankDetail)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Admin\VendorsBankDetail  $vendorsBankDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, VendorsBankDetail $vendorsBankDetail)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Admin\VendorsBankDetail  $vendorsBankDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, VendorsBankDetail $vendorsBankDetail)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Admin\VendorsBankDetail  $vendorsBankDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, VendorsBankDetail $vendorsBankDetail)
    {
        //
    }
}
