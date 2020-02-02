<?php

namespace App\Model;

use Artesaos\Defender\Traits\HasDefender;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Users extends Authenticatable 
{
	use HasDefender;

    protected $table      = "users";
	protected $primaryKey = 'users_id';
	protected $fillable   = ['first_name', 'last_name', 'email', 'password', 'address', 'cep', 'neighoarhood', 'countries_id', 'states_id', 'cities_id',  'sexes_id', 'phone', 'cellphone', 'image', 'image_legend', 'image_credits', 'status', 'remember_token', 'created_at', 'updated_at'];

	protected $hidden = [
        'password', 'remember_token',
    ];
    
	public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    }

    public function status()
    {   
        switch ($this->status) {
            case '1':
                return 'Ativo';
            break;
            case '2':
                return 'Inativo';
            break;
        }
    }

    public function roles()
    {
        return $this->belongsToMany('App\Model\Roles', 'role_user', 'user_id', 'role_id');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Model\Permissions', 'permission_user', 'user_id', 'permission_id');
    }
}
