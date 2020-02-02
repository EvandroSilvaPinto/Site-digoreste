<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $table      = "permissions";
	protected $fillable   = ['name', 'readable_name', 'created_at', 'updated_at'];

	public function users()
    {
        return $this->belongsToMany('App\Model\Users', 'permission_user', 'permission_id', 'user_id');
    }
}
