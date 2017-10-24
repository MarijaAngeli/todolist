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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'TodosController@index');
Route::post('/create/task','TodosController@store');
Route::get('/task/{id}/edit','TodosController@edit');
Route::post('/task/{id}/update','TodosController@update');
Route::get('/task/completed/{id}','TodosController@completed');
Route::get('/delete/task/{id}','TodosController@destroy');
