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

Route::get('index1/{id?}/{pass?}', 'HelloController@index1');

Route::get('index2', 'HelloController@index2');
Route::get('index2/other', 'HelloController@other');

Route::get('invoke', 'HelloController');
Route::get('index3', 'HelloController@index3');


//Route::get('hello/{id?}', 'HelloController@index');
Route::get('hellorequest', 'HelloController@indexRequest');

Route::get('hello', 'HelloController@index');
Route::post('hello', 'HelloController@post');

use \App\Http\Middleware\HelloMiddleware;
Route::get('hellolayout', 'HelloController@indexLayout');
Route::post('hellolayout', 'HelloController@post');

Route::get('hellodb', 'HelloController@indexDB');
// Route::post('hellodb', 'HelloController@post');
Route::get('hellodb/add', 'HelloController@add');
Route::post('hellodb/add', 'HelloController@create');
Route::get('hellodb/edit', 'HelloController@edit');
Route::post('hellodb/edit', 'HelloController@update');
Route::get('hellodb/del', 'HelloController@del');
Route::post('hellodb/del', 'HelloController@remove');
Route::get('hellodb/show', 'HelloController@show');


Route::get('homework', 'HomeworkController@index');
Route::post('homework', 'HomeworkController@confirm');
Route::post('homework/thankyou', 'HomeworkController@thankyou');

// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('homework');

Route::get('homework/system', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('homework/system', 'Auth\LoginController@login');
Route::post('homework/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('homework/system/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('homework/system/register', 'Auth\RegisterController@register');

Route::get('members/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('members/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('members/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('members/password/reset', 'Auth\ResetPasswordController@reset');

Route::get('homework/system/answer/index', 'AnswerController@answer')->middleware('auth');
Route::post('homework/system/answer/index', 'AnswerController@search');
Route::post('homework/system/answer/index/delete/answer', 'AnswerController@delete');

Route::get('homework/system/answer/{id}', 'AnswerController@show');
Route::post('homework/system/answer/{id}', 'AnswerController@delete_this');
