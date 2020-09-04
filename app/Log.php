<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
	protected $table = 'logs';
	protected $fillable = [
		'log_type','invoice_id','moderator_id','client_id','amount'
	];
}
