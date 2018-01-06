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
    return "Home";
});

Route::get('/usuarios', 'UserController@index')
    ->name('users.index');

Route::get('/usuario/{user}', 'UserController@show')
    ->where('user', '[0-9]+')
    ->name('users.show');

Route::get('/usuario/nuevo', 'UserController@create')
    ->name('users.new');

Route::post('/usuarios', 'UserController@store');

Route::get('/usuario/{id}/edit', 'UserController@edit')
    ->where('id', '[0-9]+')
    ->name('users.edit');

//Route::get('saludo/{name}/{nickname?}', 'WelcomeUserController@index');

Route::get('saludo/{name}', 'WelcomeUserController@name');

Route::get('saludo/{name}/{nickname}', 'WelcomeUserController@apodo');
