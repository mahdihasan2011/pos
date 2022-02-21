<?php

namespace App\Model;

use Spatie\Permission\Models\Role AS BaseRole;
use Illuminate\Database\Eloquent\Model;


class Role extends BaseRole
{
	protected $fillable = ['name', 'display_name', 'description', 'guard_name'];

    public function user_role()
    {
        return $this->belongsToMany('App\Model\RoleUser', 'role_id', 'id');
    }
}
