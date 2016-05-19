<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function(){
    return "<a href='/admin'>admin</a>";
});

Route::get('/admin', function(){
    return redirect('/admin/home');
});

Route::group(['middleware' => 'auth', 'prefix'=>'admin'], function(){
    Route::get('home', 'Admin\HomeController@getHome');
    Route::resource('content', 'Admin\ContentController');
    Route::resource('category', 'Admin\CategoryController');
});

Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');