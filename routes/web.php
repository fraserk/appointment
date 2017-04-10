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

Route::get('/home', 'HomeController@index');
Route::get('/services', 'backendController@services')->name('services');
Route::get('/settings', 'backendController@settings')->name('settings');
Route::get('/appointment/{user}', 'bookingController@index')->name('booking');
Route::get('/service/{service}/', 'bookingController@show')->name('show.service');
