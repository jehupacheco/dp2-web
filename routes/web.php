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


	Route::get('/usuarios/1/perfil','UserController@show_profile');



	Route::get('/usuarios/nuevo','UserController@create');
	Route::post('/usuarios/nuevo','UserController@store');
	Route::get('/cambiar/password','UserController@change_password');
	Route::post('/cambiar/password/save','UserController@post_change_password');

	Route::resource('organizations', 'OrganizationsController');


});

Route::group(['middleware' => ['permission:Clientes']], function () {
	Route::get('/clientes','ClientController@index');
	Route::get('/clientes/nuevo','ClientController@create');
	Route::post('/clientes/nuevo','ClientController@store');

	Route::get('/clientes/{cliente_id}/perfil','ClientController@show_profile');

	Route::get('/clientes/{cliente_id}/edit','ClientController@showedit');
	Route::post('/clientes/{cliente_id}/edit','ClientController@update');
});

Route::group(['middleware' => ['permission:Seguridad']], function () {

	Route::get('/roles','RolesController@index');
	Route::get('/roles/nuevo','RolesController@create');
	Route::post('/roles/nuevo','RolesController@store');

	Route::get('/roles/{role_id}/edit','RolesController@edit');
	Route::post('/roles/{role_id}/edit','RolesController@post_edit');
});


Route::group(['middleware' => ['permission:Alquileres']], function () {
	Route::get('/alquileres/index', 'RentingController@index');
	Route::post('/alquileres/index/filtrado', 'RentingController@filtrado_alquileres');

	Route::get('/alquileres/nuevo', 'RentingController@create');
	Route::post('/alquileres/nuevo', 'RentingController@store');
	Route::get('/alquileres/{renting_id}/destroy', 'RentingController@destroy');

	//Entregas y devoluciones
	Route::get('/alquileres/entrega-devolucion/nuevo', 'RentingController@create_entdev');
	Route::get('/alquileres/entrega-devolucion/{renting_id}/nuevo', 'RentingController@create_selected_entdev');
	Route::post('/alquileres/entrega-devolucion/{renting_id}/nuevo', 'RentingController@store_entdev');

});


Route::get('/reportes/recorrido/filtro', 'HomeController@reporte_recorrido_filtro');
Route::post('/reportes/recorrido/filtro/filtrado', 'HomeController@reporte_recorrido_filtrado');



Route::get('/sensores/{id}','SensorController@index');

Route::get('/alertas','AlertController@index');

Route::get('/ubicaciones/buscar_usuario','LocationController@search_user');

Route::get('/ubicaciones/buscar/usuarios','LocationController@users_result');

Route::get('/ubicaciones/usuario/1/mapa','LocationController@mostrar_mapa');




Route::group(['middleware' => ['permission:Vehículos - Solo su Organización|Vehículos - Todas las Organizaciones|Vehículos para pacientes de Cardiopatía|Vehículos para la Jardinería|Vehículos para Ventas|Vehículos Eco-amigables|Vehículos para Trasporte Urbano 1|Vehículos para Trasporte Urbano 2']], function () {
	Route::get('/vehiculos/Configuracion','AutoController@configuracion');

	Route::get('/vehiculos/{id}/deshabilitar','AutoController@deshabilitar');
	Route::post('/vehiculos/deshabilitarPut','AutoController@deshabilitarPut');
	Route::get('/deshabilitar/{id_available}/destroyPut','AutoController@destroyPutAvailability');
	

	Route::post('/vehiculos/put/configuracion','AutoController@configuracionPut');

	Route::get('/vehiculos/{id}/ver','AutoController@ver');
	Route::get('/vehiculos/{tipo_id}/lista','AutoController@mostrar_lista_tipo');
	Route::get('/vehiculos/{tipo_id}/nuevo','AutoController@create');
	Route::post('/vehiculos/{tipo_id}/nuevo','AutoController@store');

	Route::get('/vehiculos/{id}/ubicacion', 'AutoController@ubicacion');


	Route::get('/vehiculos/{id}/edit', 'AutoController@showedit');
	Route::post('/vehiculos/{id}/edit', 'AutoController@update');
});



Route::group(['middleware' => ['permission:Estacionamiento']], function () {
    Route::get('/estacionamiento','ParkingController@index');
});

Route::get('/reportes/{id_viaje}/{id_vehiculo}/clienteXvehiculo','HomeController@clienteXvehiculo');
Route::post('/reportes/{travel_id}/vehiculo/{id_vehiculo}/clienteXvehiculoPostMet','HomeController@clienteXvehiculoPostMet');

Route::get('/Filtros/filtroAutos','HomeController@filtroAutos');

Route::get('/Filtros/filtroUsuarios','HomeController@filtroUsuarios');

Route::get('/reportes/filtrosReportes','HomeController@filtroReporte');

Route::get('/reportes/viajesCliente','HomeController@viajesCliente');


Route::get('/infracciones/nuevo','HomeController@infracciones');
Route::post('Infracciones/nuevoPost','HomeController@infraccionesPost');
Route::get('/infracciones/{id}/destroyPut','HomeController@destroyPutInfracciones');

Route::get('/reportes/sensores','HomeController@sensores');
Route::post('/reportes/sensores/filtrado', 'HomeController@filtrado_sensores');
Route::post('reportes/recorridos/postMet', 'HomeController@filtrado_sensores_reporte_postMet');