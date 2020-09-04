<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
	public function products()
    {
        return $this->hasMany('App\Product');
    }
    protected $table = 'brands';
    protected $fillable = [
    	'name','keywords','image','description',
    ];

}
