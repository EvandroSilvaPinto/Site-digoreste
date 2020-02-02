<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table      = "gallery";
	protected $primaryKey = 'gallery_id';
	protected $fillable   = ['entity', 'entity_id', 'path', 'title', 'subtitle', 'created_at', 'updated_at'];
}
