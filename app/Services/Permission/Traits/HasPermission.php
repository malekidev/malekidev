<?php

namespace App\Services\Permission\Traits;

use App\Models\Permission;

trait HasPermission
{
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function givePermissions(...$permissions): static
    {

        $permissions = $this->getAllPermissions($permissions);

        if ($permissions->isEmpty()) return $this;

        $this->permissions()->syncWithoutDetaching($permissions);

        return $this;
    }

    public function withDrawPermissions(...$permissions): static
    {

        $permissions = $this->getAllPermissions($permissions);

        if ($permissions->isEmpty()) return $this;

        $this->permissions()->detach($permissions);

        return $this;
    }

    public function refreshPermissions(...$permissions): static
    {

        $permissions = $this->getAllPermissions($permissions);


        $this->permissions()->sync($permissions);

        return $this;
    }

    public function hasPermission(Permission $permission)
    {

        return $this->permissions->contains($permission);

    }

    public function getAllPermissions($permissions)
    {
        return Permission::whereIn('name', $permissions)->get();
    }
}
