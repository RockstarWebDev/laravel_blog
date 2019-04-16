<?php

namespace App\Policies;

use App\Model\admin\admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the admin.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\admin  $admin
     * @return mixed
     */
    public function view(admin $user, admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can create admins.
     *
     * @param  \App\Model\user\User  $user
     * @return mixed
     */
    public function create(admin $user)
    {
         return $this->getAdminUser($user, 1);
    }

    /**
     * Determine whether the user can update the admin.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\admin  $admin
     * @return mixed
     */
    public function update(admin $user, admin $admin)
    {
        return $this->getAdminUser($user, 2);
    }

    /**
     * Determine whether the user can delete the admin.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\admin  $admin
     * @return mixed
     */
    public function delete(admin $user, admin $admin)
    {
        return $this->getAdminUser($user, 3);
    }


    public function SuperAdmin(admin $user)
    {
        return $this->getAdminUser($user, 9);
    }

    Protected function getAdminUser(admin $user, $u_id)
    {
        foreach ($user->roles as $role)
         {
            foreach ($role->permissions as $permission) 
            {
                if ($permission->id == $u_id) {
                    return true;
                }
            }
        }
        return false;
    }
}
