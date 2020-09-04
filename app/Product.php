<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
    	return $this->belongsTo('App\Category');   
    }
        
    public function brand(){
        return $this->belongsTo('App\Brand');   
    }

	protected $table = 'products';
	protected $fillable = [
		'name','description','keywords','image','brand_id','category_id','original_price','sale_price','discount','count',
        'new_price','saled_count','code',
	];
}
