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

Route::get('visitor', 'VisitorController@showhome')->name('visitor');

Route::get('', function () {
    return redirect()->route('visitor');
});

Route::post('visitor','VisitorController@store');

Route::post('eplus', 'EplusController@uploadFiles');

Route::get('/test', function () {
    return view('welcome');
});