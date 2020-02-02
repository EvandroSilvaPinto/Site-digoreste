<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sexes extends Model
{
    protected $table      = "sexes";
	protected $primaryKey = 'sexes_id';
	protected $fillable   = ['name', 'status', 'created_at', 'updated_at'];

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

    public function users()
    {   
        return $this->hasMany('App\Model\Sexes', 'sexes_id', 'sexes_id');     
    } 
}
