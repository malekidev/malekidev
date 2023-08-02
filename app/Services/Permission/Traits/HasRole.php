<?php

namespace App\Services\Permission\Traits;

use App\Models\Permission;
use App\Models\Role;

trait HasRole
{
    public function role(){
        return $this->hasOne(Role::class) ?? '';
    }

}
