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


Route::auth();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin'], function (){
    Route::get('/', 'Admin\DashboardController@index');
    Route::get('/users', 'Admin\UserController@index');
    Route::get('/article', 'Admin\ArticleController@index');
});

Route::group(['middleware'=>['auth']], function (){
    Route::resource('admin/article', 'Admin\ArticleController', ['except'=>['show']]);
});

Route::group(['middleware'=>['auth']], function (){
    Route::resource('admin/users', 'Admin\UserController', ['except'=>['show']]);
});


