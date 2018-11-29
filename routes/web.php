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

Route::get('/', 'Video\VideoController@index');
Route::get('/videos/{name}', 'Video\VideoController@show');
Route::get('/videos/show/{id}', 'Video\VideoController@describe');

Route::get('/upload', 'Video\VideoController@create')->middleware('auth');
Route::get('/videos/edit/{id}', 'Video\VideoController@edit')->middleware('auth');
Route::get('/videos/del/{id}', 'Video\VideoController@destroy')->middleware('auth');
Route::get('/videos/upd/{id}', 'Video\VideoController@update')->middleware('auth');
Route::get('/channel', 'Video\VideoController@index_channel')->middleware('auth');
Auth::routes();

