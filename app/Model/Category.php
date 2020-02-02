<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table      = "category";
	protected $primaryKey = 'category_id';
	protected $fillable   = ['title', 'status', 'created_at', 'updated_at'];

	public function status() 
	{
		switch ($this->status) {
			case '1':
				return "Ativo";
			break;
			case '2':
				return "Inativo";
			break;
		}
	}

	public function subcategorys()
	{
		return $this->hasMany('App\Model\Subcategory');
	}
}
