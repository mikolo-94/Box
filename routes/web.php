<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/box', [
    'uses' => 'BoxController@index',
    'as' => 'box.index'
]);

Route::get('box/create', function () {
    return view('create');
});

Route::post('/box', [
    'uses' => 'BoxController@store',
    'as' => 'box.store'
]);