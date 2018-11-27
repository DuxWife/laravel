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
Route::get('/', 'NotesController@show');
Route::post('/','NotesController@add');
Route::delete('/{id}','NotesController@delete');
Route::post('update_notes','NotesController@patch');


Auth::routes();