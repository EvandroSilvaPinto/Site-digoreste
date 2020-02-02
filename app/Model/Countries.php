<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    protected $table      = "countries";
	protected $primaryKey = 'countries_id';
	protected $fillable   = ['name', 'initials', 'status', 'created_at', 'updated_at'];

	public function status() {
		
		switch ($this->status) {
			case '1':
				return "Ativo";
			break;
			case '2':
				return "Inativo";
			break;
		}
	}

	public function state()
    {
        return $this->hasOne('App\Model\States', 'countries_id', 'countries_id');
    }

	public function states()
    {
        return $this->hasMany('App\Model\States', 'countries_id', 'countries_id');
    }

    public function students()
    {
        return $this->hasMany('App\Model\Students', 'countries_id', 'countries_id');
    }
}
