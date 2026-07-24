<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Academia;
use Illuminate\Auth\Access\HandlesAuthorization;

class AcademiaPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Academia');
    }

    public function view(AuthUser $authUser, Academia $academia): bool
    {
        return $authUser->can('View:Academia');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Academia');
    }

    public function update(AuthUser $authUser, Academia $academia): bool
    {
        return $authUser->can('Update:Academia');
    }

    public function delete(AuthUser $authUser, Academia $academia): bool
    {
        return $authUser->can('Delete:Academia');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Academia');
    }

    public function restore(AuthUser $authUser, Academia $academia): bool
    {
        return $authUser->can('Restore:Academia');
    }

    public function forceDelete(AuthUser $authUser, Academia $academia): bool
    {
        return $authUser->can('ForceDelete:Academia');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Academia');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Academia');
    }

    public function replicate(AuthUser $authUser, Academia $academia): bool
    {
        return $authUser->can('Replicate:Academia');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Academia');
    }

}