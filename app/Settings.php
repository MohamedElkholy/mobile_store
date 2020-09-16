<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'settings';
    protected $fillable = ['store_name','store_logo','status','close_message','logo','icon','invoice_message','phone_number','address','commercial_register'];
}
