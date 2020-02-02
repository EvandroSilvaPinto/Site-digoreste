<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Log_erros extends Model
{
    protected $table      = "log_erros";
	protected $primaryKey = 'log_erros_id';
	protected $fillable   = ['message', 'code', 'file', 'line', 'severity', 'created_at', 'updated_at'];
}
