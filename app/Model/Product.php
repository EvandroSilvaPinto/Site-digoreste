<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table      = "product";
	protected $primaryKey = 'product_id';
	protected $fillable   = ['title', 'category_id', 'subcategory_id', 'image', 'status', 'created_at', 'updated_at'];

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
}
