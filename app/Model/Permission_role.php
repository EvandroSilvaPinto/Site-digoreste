<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Permission_role extends Model
{
	public $timestamps  = FALSE;
	protected $table    = "permission_role";
	protected $fillable = ['permission_id', 'role_id', 'value', 'expires'];

	public function permission()
	{
		return $this->hasOne('App\Model\Permissions', 'id', 'permission_id');
	}
}
