<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    protected $table      = "summary";
	protected $primaryKey = 'summary_id';
	protected $fillable   = ['title', 'image', 'text', 'status', 'created_at', 'updated_at'];

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
