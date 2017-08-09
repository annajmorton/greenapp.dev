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

// Route::get('visitor', 'VisitorController@showhome')->name('visitor');

// Route::get('', function () {
//     return redirect()->route('visitor');
// });
// Route::post('visitor','VisitorController@store');
// Route::get('alpha','VisitorController@store');
// Route::post('eplus', 'EplusController@uploadFiles');
// Route::put('eplus', 'EplusController@runDefault');

// // testing site visiting capacity
// Route::get('loaderio-575b745215eb9a611a928399a24abac8', function(){
// 	return view('loaderio');
// });




// these are all for the Ibpsa conference
Route::resource('ibpsa17', 'Ibpsa17Controller');
Route::get('/guess', function () {
    return view('ibpsa/guess');
});
Route::get('/score', function () {
    return view('ibpsa/score');
});
Route::get('/post', function () {
    return view('ibpsa/post');
});

Route::get('', function () {
    return view('ibpsa/guess');
});