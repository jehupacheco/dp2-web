<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/', 'HomeController@index');
Route::get('/auto','HomeController@auto');
Route::get('/asignarauto','HomeController@asignarauto');

Route::get('/clientes','ClientController@index');
Route::get('/clientes/nuevo','ClientController@create');
Route::post('/clientes/nuevo','ClientController@store');

Route::get('/clientes/1/perfil','UserController@show_profile');




Route::get('/seguridad/nuevo_usuario','UserController@new_user');

Route::get('/sensores','SensorController@index');

Route::get('/alertas','AlertController@index');

Route::get('/ubicaciones/buscar_usuario','LocationController@search_user');

Route::get('/ubicaciones/buscar/usuarios','LocationController@users_result');

Route::get('/ubicaciones/usuario/1/mapa','LocationController@mostrar_mapa');




Route::get('/vehiculos/{tipo_id}/lista','AutoController@mostrar_lista_tipo');
Route::get('/vehiculos/{tipo_id}/nuevo','AutoController@create');
Route::post('/vehiculos/{tipo_id}/nuevo','AutoController@store');




Route::get('/estacionamiento','ParkingController@index');

