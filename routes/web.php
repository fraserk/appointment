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
Route::get('/service/{service}/provider/{user}','bookingController@providerSchedule');
Route::post('/service/{service}/provider/{user}','bookingController@store');

Route::prefix('backend')->group(function(){
    route::get('/services/create','serviceController@create')->name('service.create');
    route::post('/services','serviceController@store')->name('service.store');
    route::patch('/services/{service}','serviceController@update')->name('service.update');

    Route::get('/{company}/staff', 'staffsController@index')->name('staff.index');
    Route::post('/staff', 'staffsController@store')->name('staff.store');
    Route::get('/settings/schedule/create','schedulesController@create')->name('schedule.create');
    Route::patch('/settings/schedule/{schedule}/update','schedulesController@update')->name('schedule.update');
});
