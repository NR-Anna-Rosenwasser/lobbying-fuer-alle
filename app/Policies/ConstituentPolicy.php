<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Constituent;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConstituentPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Constituent');
    }

    public function view(AuthUser $authUser, Constituent $constituent): bool
    {
        return $authUser->can('View:Constituent');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Constituent');
    }

    public function update(AuthUser $authUser, Constituent $constituent): bool
    {
        return $authUser->can('Update:Constituent');
    }

    public function delete(AuthUser $authUser, Constituent $constituent): bool
    {
        return $authUser->can('Delete:Constituent');
    }

    public function restore(AuthUser $authUser, Constituent $constituent): bool
    {
        return $authUser->can('Restore:Constituent');
    }

    public function forceDelete(AuthUser $authUser, Constituent $constituent): bool
    {
        return $authUser->can('ForceDelete:Constituent');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Constituent');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Constituent');
    }

    public function replicate(AuthUser $authUser, Constituent $constituent): bool
    {
        return $authUser->can('Replicate:Constituent');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Constituent');
    }

}