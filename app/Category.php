<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	public function products()
    {
        return $this->hasMany('App\Product');
    }	
    protected $table = 'categories';
    protected $fillable = [
    	'name','keywords','image','description',
    ];

}
