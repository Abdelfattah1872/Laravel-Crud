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


Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
//  create new ticket
Route::get('/ticket', 'TicketsController@create');
Route::post('/store', 'TicketsController@store');
//  show tickets
Route::get('/show/{id}', 'HomeController@show');
//edit tickets
Route::get('/edit/{id}', 'TicketsController@edit');
Route::post('/update/{id}','TicketsController@update');
//delete tickets
Route::get('/delete/{id}', 'TicketsController@delete');
//search
Route::get('/search', 'TicketsController@search');
