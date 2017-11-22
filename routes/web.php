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
Route::group(['middleware' => ['auth']], function () {
	Route::get('/', 'HomeController@index');
	Route::get('/asignarauto','HomeController@asignarauto');

	Route::get('/clientes','ClientController@index');
	Route::get('/clientes/nuevo','ClientController@create');
	Route::post('/clientes/nuevo','ClientController@store');

	Route::get('/usuarios/1/perfil','UserController@show_profile');
	Route::get('/clientes/{cliente_id}/perfil','ClientController@show_profile');



	Route::get('/usuarios/nuevo','UserController@create');
	Route::post('/usuarios/nuevo','UserController@store');
	Route::get('/cambiar/password','UserController@change_password');
	Route::post('/cambiar/password/save','UserController@post_change_password');

	Route::resource('organizations', 'OrganizationsController');


	Route::get('/roles','RolesController@index');
	Route::get('/roles/nuevo','RolesController@create');
	Route::post('/roles/nuevo','RolesController@store');
});





Route::get('/alquileres/index', 'RentingController@index');
Route::post('/alquileres/index/filtrado', 'RentingController@filtrado_alquileres');

Route::get('/alquileres/nuevo', 'RentingController@create');
Route::post('/alquileres/nuevo', 'RentingController@store');
Route::get('/alquileres/{renting_id}/destroy', 'RentingController@destroy');


Route::get('/sensores/{id}','SensorController@index');

Route::get('/alertas','AlertController@index');

Route::get('/ubicaciones/buscar_usuario','LocationController@search_user');

Route::get('/ubicaciones/buscar/usuarios','LocationController@users_result');

Route::get('/ubicaciones/usuario/1/mapa','LocationController@mostrar_mapa');




Route::group(['middleware' => ['permission:Vehículos para pacientes de Cardiopatía|Vehículos para la Jardinería|Vehículos para Ventas|Vehículos Eco-amigables|Vehículos para Trasporte Urbano 1|Vehículos para Trasporte Urbano 2']], function () {
	Route::get('/vehiculos/Configuracion','AutoController@configuracion');

	Route::get('/vehiculos/{id}/deshabilitar','AutoController@deshabilitar');
	Route::post('/vehiculos/{id}/deshabilitarPut','AutoController@deshabilitarPut');

	Route::post('/vehiculos/put/configuracion','AutoController@configuracionPut');

	Route::get('/vehiculos/{id}/ver','AutoController@ver');
	Route::get('/vehiculos/{tipo_id}/lista','AutoController@mostrar_lista_tipo');
	Route::get('/vehiculos/{tipo_id}/nuevo','AutoController@create');
	Route::post('/vehiculos/{tipo_id}/nuevo','AutoController@store');

	Route::get('/vehiculos/{id}/ubicacion', 'AutoController@ubicacion');
});



Route::group(['middleware' => ['permission:Estacionamiento']], function () {
    Route::get('/estacionamiento','ParkingController@index');
});

Route::get('/reportes/clienteXvehiculo','HomeController@clienteXvehiculo');

Route::get('/Filtros/filtroAutos','HomeController@filtroAutos');

Route::get('/Filtros/filtroUsuarios','HomeController@filtroUsuarios');

Route::get('/reportes/filtrosReportes','HomeController@filtroReporte');

Route::get('/reportes/viajesCliente','HomeController@viajesCliente');

Route::get('/reportes/sensores','HomeController@sensores');
