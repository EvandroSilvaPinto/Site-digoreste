<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Abouts extends Model
{
    protected $table      = "abouts";
	protected $primaryKey = 'abouts_id';
	protected $fillable   = ['title', 'text', 'status', 'created_at', 'updated_at'];

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
}
