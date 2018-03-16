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

Auth::routes();

Route::get('/user/edit/{id_user}','UserController@edit');
Route::post('/user/edit/{id_user}','UserController@store');
Route::post('/user/reset-pass/{id_user}','UserController@resetPasswordStore');
Route::get('/user/reset-pass/{id_user}','UserController@resetPassword');