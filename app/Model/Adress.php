<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    protected $table      = "adress";
	protected $primaryKey = 'adress_id';
	protected $fillable   = ['title', 'image', 'text', 'link', 'status', 'created_at', 'updated_at'];

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
