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
Route::get('alpha','VisitorController@store');

Route::post('eplus', 'EplusController@uploadFiles');
Route::put('eplus', 'EplusController@runDefault');
Route::get('loaderio-575b745215eb9a611a928399a24abac8', function(){
	return view('loaderio');
});
Route::get('/guess', function () {
    return view('guess');
});
Route::get('/score', function () {
    return view('score');
});
Route::get('/instructions', function () {
    return view('instructions');
});
Route::resource('ibpsa17', 'Ibpsa17Controller');