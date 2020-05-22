<?php

namespace Modules\Companies\Entities\PermissionGroups;
use Illuminate\Database\Eloquent\Model;
use Modules\Companies\Entities\Permissions\Permission;

class PermissionGroup extends Model
{
    public $fillable = [
        'name',
    ];

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
