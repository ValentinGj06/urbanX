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

Route::resource('/admin/users', 'Admin\UsersController', ['except' => ['show', 'create', 'store']])->middleware('can:user-management');

// Locations routes
Route::get('/locations', 'LocationController@index')->name('locations');
Route::get('/locations/create', 'LocationController@create')->name('create');
Route::post('/locations', 'LocationController@store')->name('store');
Route::get('/locations/{location}', 'LocationController@show')->name('show');
Route::get('/locations/{location}/edit', 'LocationController@edit')->name('edit');
Route::patch('/locations/{location}', 'LocationController@update')->name('update');
Route::delete('/locations/{location}', 'LocationController@destroy')->name('destroy');
Route::get('/locations/{location}/delete', 'LocationController@destroy')->name('delete');
// Cars routes
Route::get('/cars', 'CarController@index')->name('cars');
Route::get('/{location}/cars/create', 'CarController@create')->name('create');
Route::post('/{location}/cars/create', 'CarController@create')->name('create_post');
Route::post('/cars', 'CarController@store')->name('store');
Route::get('/cars/{car}', 'CarController@show')->name('show');
Route::get('/mycars', 'CarController@showCarsFromOwner')->name('mycars');
Route::get('/cars/{car}/edit', 'CarController@edit')->name('edit');
Route::patch('/cars/{car}', 'CarController@update')->name('update');
Route::delete('/cars/{car}', 'CarController@destroy')->name('destroy');
Route::get('/cars/{car}/delete', 'CarController@destroy')->name('delete');
