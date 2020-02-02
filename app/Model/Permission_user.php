<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Permission_user extends Model
{
	public $timestamps  = false;
	protected $table    = "permission_user";
	protected $fillable = ['user_id', 'permission_id', 'value', 'expires'];
}
