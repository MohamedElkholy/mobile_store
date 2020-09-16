<?php
Route::group(['prefix'=>'admincp','namespace'=>'admincp'], function () {
    Config::set('auth.define', 'admin');
    Route::get('login','AdminAuth@login');
    Route::post('login','AdminAuth@dologin');
    Route::get('forgot/password','AdminAuth@forgot_password');
    Route::post('forgot/password','AdminAuth@forgot_password_reset');
    Route::get('reset/password/{token}','AdminAuth@reset_password');
    Route::post('reset/password/{token}','AdminAuth@reset_password_done');

    Route::group(['middleware'=>'moderator:moderator'], function () {

        Route::get('settings','SettingsController@index');
        Route::put('settings/update','SettingsController@update');
        
        route::put('moderator/profile/{id}','ModeratorController@update_profile');
        
        Route::resource('moderator','ModeratorController');
        Route::resource('brand','BrandController');
        Route::resource('category','CategoryController');
        Route::resource('client','ClientController');

        Route::resource('invoice','InvoiceController');
        Route::post('invoice/done/{id}','InvoiceController@done_invoice');

        Route::resource('product','ProductController');
        Route::get('product/show/table','ProductController@show_in_table');
        Route::get('searchfor','ProductController@search')->name('searchforproduct');
        // Route::get('product/add/note','ProductController@show_in_table');
        
        Route::get('search','SaleController@search')->name('search');
        Route::get('select','SaleController@select')->name('select');
        Route::get('operation/sale','SaleController@sale');
        Route::get('operation/retrieve','OperationController@retrieve');
        Route::get('operation/do_retrieve/{id}','OperationController@do_retrieve');
        Route::get('operation/search','OperationController@search')->name('operation_search');
        Route::post('operation/retrieve/do','SaleController@doretrieve');
        Route::post('operation/sale/do','SaleController@dosale');
        // Route::get('operation/newService','ServiceController@create');
        Route::resource('operation','OperationController');
        // Route::resource('service','ServiceController');
        
        Route::get('/', function () {
            return view('admincp.home',['title'=>trans('admincp.adminPanel')]);
        });
        Route::any('logout','AdminAuth@logout');

        Route::get('report','ReportController@index');
    });
 
});
