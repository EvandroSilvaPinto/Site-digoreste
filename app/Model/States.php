<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    protected $table      = "states";
	protected $primaryKey = 'states_id';
	protected $fillable   = ['name', 'initials', 'status', 'cd_ibge', 'countries_id', 'created_at', 'updated_at'];

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

	public function citie()
    {
        return $this->hasOne('App\Model\Cities', 'states_id', 'states_id');
    }

    public function cities()
    {
        return $this->hasMany('App\Model\Cities', 'states_id', 'states_id');
    }

	public function countrie()
    {
        return $this->hasOne('App\Model\Countries', 'countries_id', 'countries_id');
    }

    public function students()
    {
        return $this->hasMany('App\Model\Students', 'states_id', 'states_id');
    }
}
