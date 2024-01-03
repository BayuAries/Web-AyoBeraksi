<?php

namespace App\Helpers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class PermissionHelper
{
    // Check if user has a specified permission
    public static function isHavePermission($permission)
    {
        return in_array($permission, PermissionHelper::permissionAccess());
    }

    // Get all permissions belongs to user
    public static function permissionAccess()
    {
        if (Auth::check()) {
            if (Auth::user()->role()) {
                $permissions = Auth::user()->role->permissions()->pluck('permission_id')->toArray();
                $permissions = Permission::whereIn('id', $permissions)->pluck('nama')->toArray();
                return $permissions;
            }
        }
        else {
            return [];
        }
    }

}
