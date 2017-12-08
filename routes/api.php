<?php

use Illuminate\Http\Request;

Route::get('address','API\AddressAndPhoneAPIController@indexAddress');
Route::get('phone','API\AddressAndPhoneAPIController@indexPhone');
Route::get('address/{id}','API\AddressAndPhoneAPIController@showAddress');
Route::get('phone/{id}','API\AddressAndPhoneAPIController@showPhone');

Route::resource('maps','API\MapsAPIController');
Route::resource('conduct','API\ConductAPIController');
Route::resource('news','API\NewsAPIController');
