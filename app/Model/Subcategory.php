<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table      = "subcategory";
	protected $primaryKey = 'subcategory_id';
	protected $fillable   = ['category_id', 'title', 'status', 'created_at', 'updated_at'];

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

	public function products()
	{
		return $this->hasMany('App\Model\Product');
	}
	public function categorys(){
        return $this->belongsTo('App\Model\Category','category');
    }
}
