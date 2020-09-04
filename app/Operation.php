<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $with = ['invoice'];

    public function invoice(){
        return $this->belongsTo('App\Invoice');   
    }
    public function product(){
        return $this->belongsTo('App\Product');   
    }    
    public function moderator(){
        return $this->belongsTo('App\Moderator');   
    }
    
}
