<?php

Route::get('/', function () {
    return view('welcome');
});



Route::post('account/authenticate', 'Dashboard\AccountController@authenticate');
//Declarado o nome login para a rota devido o middleware setar como layout para caso o usuário acesse páginas sem se autenticar
Route::get('account/createAuthenticate', 'Dashboard\AccountController@createAuthenticate')->name('login');
Route::resource('account','Dashboard\AccountController');

Route::resource('api','Dashboard\APIController');

Route::group(['middleware' => 'auth'], function(){

  Route::get('/dashboard','Dashboard\DashboardTemplate@index')->name('dashboard');
  Route::get('/exit', 'Dashboard\DashboardTemplate@exit');

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

  Route::get('/conduct/list', 'Dashboard\ConductController@list')->name('listConduct');
  Route::resource('conduct', 'Dashboard\ConductController');

});
