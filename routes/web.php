<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
	try{
    $title = settings()->store_name ;
    $store_name = settings()->store_name;
	}catch(Exception $e){
		$title = trans('title');
		$store_name ="xampp". trans('admincp.open_appache');
	}
    return view('welcome',compact('title','store_name'));
});

