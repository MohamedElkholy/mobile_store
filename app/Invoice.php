<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function operations()
    {
        return $this->hasMany('App\Operation');
    }
    public function client(){
        return $this->belongsTo('App\Client');   
    }
    public function moderator(){
        return $this->belongsTo('App\Moderator');   
    }
}
