<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome () {
	try{
    $title = settings()->store_name ;
    $store_name = settings()->store_name;
	}catch(Exception $e){
		$title = trans('title');
		$store_name ="xampp". trans('admincp.open_appache');
	}
    return view('welcome',compact('title','store_name'));
}
}
