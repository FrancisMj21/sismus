<?php

namespace App\Support;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Models\Role;

class AuthorizationService
{
    /**
     * Verifica si el usuario es Superadmin.
     */
    public static function isSuperAdmin(User $user): bool
    {
        return $user->hasRole('Superadmin');
    }

    /**
     * Filtra los roles visibles para el usuario.
     */
    public static function scopeRoles(Builder $query, User $user): Builder
    {
        if (self::isSuperAdmin($user)) {
            return $query;
        }

        return $query->where('name', '!=', 'Superadmin');
    }

    /**
     * Devuelve los roles que puede asignar el usuario.
     */
    public static function assignableRoles(User $user)
    {
        if (self::isSuperAdmin($user)) {
            return Role::pluck('name', 'name');
        }

        return Role::where('name', '!=', 'Superadmin')
            ->pluck('name', 'name');
    }
}