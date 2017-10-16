<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard','Dashboard\DashboardTemplate@index');

Route::get('/maps/list', 'Dashboard\MapsController@list')->name('list');
Route::resource('maps','Dashboard\MapsController');

Route::get('/addressAndPhone/listAddress', 'Dashboard\AddressAndPhoneController@listAddress');
Route::get('/addressAndPhone/listPhone', 'Dashboard\AddressAndPhoneController@listPhone');
Route::get('/addressAndPhone/list', 'Dashboard\AddressAndPhoneController@list');
Route::resource('addressAndPhone','Dashboard\AddressAndPhoneController');
