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


Route::get('/usuarios','UserController@index');
Route::get('/usuario/1/perfil','UserController@show_profile');


Route::get('/sensores','SensorController@index');

Route::get('/alertas','AlertController@index');

Route::get('/ubicaciones/buscar_usuario','LocationController@search_user');

Route::get('/ubicaciones/buscar/usuarios','LocationController@users_result');

Route::get('/ubicaciones/usuario/1/mapa','LocationController@mostrar_mapa');