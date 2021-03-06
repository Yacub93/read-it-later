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
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Resourceful controller with authentication
|--------------------------------------------------------------------------
|
*/

Route::group(['prefix' => 'api/v1','middleware'=>['filter'],'before' => 'auth.basic'], function(){
    
	    Route::resource('/url', 'UrlController');	
	    
});



