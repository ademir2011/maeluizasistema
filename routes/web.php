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

Route::get('/dashboard','Dashboard\DashboardTemplate@index');

Route::resource('maps','Dashboard\MapsController');
Route::get('/maps/list', 'Dashboard\MapsController@list');

Route::resource('addressAndPhone','Dashboard\AddressAndPhoneController');
