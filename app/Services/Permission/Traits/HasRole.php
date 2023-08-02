<?php

namespace App\Services\Permission\Traits;


use App\Models\Role;

trait HasRole
{
    public function roles(){
        return $this->belongsToMany(Role::class,'user_role');
    }
    public function giveRoles(...$roles): static
    {

        $roles = $this->getAllRoles($roles);

        if ($roles->isEmpty()) return $this;

        $this->roles()->syncWithoutDetaching($roles);

        return $this;
    }

    public function withDrawRoles(...$roles): static
    {

        $roles = $this->getAllRoles($roles);

        if ($roles->isEmpty()) return $this;

        $this->roles()->detach($roles);

        return $this;
    }

    public function refreshRoles(...$roles): static
    {

        $roles = $this->getAllRoles($roles);


        $this->roles()->sync($roles);

        return $this;
    }

    public function hasRole(Role $role)
    {

        return $this->roles->contains($role);

    }

    public function getAllRoles($roles)
    {
        return Role::whereIn('name', $roles)->get();
    }


}
