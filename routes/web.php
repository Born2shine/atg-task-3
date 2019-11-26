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

Route::get('/', 'ATGController@index');

Route::post('/register', 'ATGController@register');
// Route::patch('/user/delete/{id}', 'ATGController@deleteUser');

// Route::get('/send', 'SendEmailController@send');
