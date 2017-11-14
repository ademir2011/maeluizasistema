<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('account/authenticate', 'Dashboard\AccountController@authenticate');
Route::resource('account','Dashboard\AccountController');

Route::get('/dashboard','Dashboard\DashboardTemplate@index');

Route::get('/maps/list', 'Dashboard\MapsController@list')->name('list');
Route::resource('maps','Dashboard\MapsController');

Route::delete('/addressAndPhone/{id}/deleteAddress', 'Dashboard\AddressAndPhoneController@deleteAddress');
Route::delete('/addressAndPhone/{id}/deletePhone', 'Dashboard\AddressAndPhoneController@deletePhone');
Route::get('/addressAndPhone/{id}/editAddress', 'Dashboard\AddressAndPhoneController@editAddress');
Route::get('/addressAndPhone/{id}/editPhone', 'Dashboard\AddressAndPhoneController@editPhone');
Route::get('/addressAndPhone/listAddress', 'Dashboard\AddressAndPhoneController@listAddress')->name('listAddress');
Route::get('/addressAndPhone/listPhone', 'Dashboard\AddressAndPhoneController@listPhone')->name('listPhone');
Route::get('/addressAndPhone/list', 'Dashboard\AddressAndPhoneController@list');
Route::resource('addressAndPhone','Dashboard\AddressAndPhoneController');

Route::get('/news/list', 'Dashboard\NewsController@list')->name('listNews');
Route::resource('news', 'Dashboard\NewsController');
