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

//Route::get('/', function () {
//    return view('welcome');
//});



Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home']);
Route::post('message', ['uses' => 'HomeController@create', 'as' => 'message.submit']);
Route::get('message/{id}/edit', ['uses' => 'HomeController@edit', 'as' => 'message.edit'])->where(['id' => '[0-9]+']);
Route::get('message/{id}/delete', ['uses' => 'HomeController@delete', 'as' => 'message.delete'])->where(['id' => '[0-9]+']);