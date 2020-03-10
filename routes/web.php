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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'imaxDolbyController@index');
Route::post('/', 'imaxDolbyController@show');
Route::get('/theaterinfo/{name_eng}', 'imaxDolbyController@info');
Route::get('/feedback', 'feedbackController@feedback');
Route::post('/feedback', 'feedbackController@confirm');
Route::post('/feedback/thankyou', 'feedbackController@thankyou');
