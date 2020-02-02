<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table      = "roles";
	protected $fillable   = ['name', 'created_at', 'updated_at'];

	public function role_user()
    {
        return $this->hasMany('App\Model\Role_user', 'role_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany('App\Model\Users', 'role_user', 'role_id', 'user_id');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Model\Permissions', 'permission_role', 'role_id', 'permission_id');
    }
}
