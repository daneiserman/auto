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

Route::get('/', 'HomeController@index')->middleware('auth');
Route::get('/chooseDriver/{id}', 'DriversController@index')->middleware('auth');
Route::post('/chooseDriver/{id}', 'DriversController@chooseDriver')->middleware('auth');

Auth::routes();
