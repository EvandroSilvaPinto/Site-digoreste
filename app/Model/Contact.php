<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	protected $table      = "contact";
	protected $primaryKey = 'contact_id';
	protected $fillable   = ['name', 'email', 'phone', 'subject', 'text', 'status','created_at', 'updated_at'];

	public function status()
	{

		switch ($this->status) {
			case '1':
				return "Lido";
				break;
			case '2':
				return "Não Lido";
				break;
		}
	}
}
