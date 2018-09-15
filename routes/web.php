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


Route::get('/usuarios','UserController@index')->name('user.index');

Route::get('/usuarios/{user}', 'UserController@show')
	->where('user', '[0-9]+')
	->name('user.show');

Route::get('/usuarios/nuevo', 'UserController@create')->name('user.create');

Route::post('/usuarios/crear', 'UserController@store');

Route::get('/saludo/{name}/{nickname?}', 'WellcomeUserController@index');