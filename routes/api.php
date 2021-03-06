<?php

Route::namespace('Api')->group(function() {
  Route::post('login', 'AuthenticateController@authenticate');
  Route::post('refreshToken', function() {})->middleware('jwt.refresh');

  Route::middleware(['jwt.auth'])->group(function() {
    Route::apiResource('clients', 'ClientController', ['except' => [
      'index', 'destroy'
    ]]);
    Route::apiResource('travels', 'TravelController', ['except' => [
      'destroy'
    ]]);
    Route::apiResource('readings', 'ReadingController', ['except' => [
      'update', 'destroy'
    ]]);
    Route::post('readings/parking', 'ReadingController@storeParkingReading');
    Route::apiResource('objectives', 'ObjectivesController');
    Route::apiResource('positions', 'PositionsController', ['except' => [
      'update', 'destroy'
    ]]);
    Route::apiResource('vehicles', 'VehicleController', ['except' => [
      'index', 'store', 'update', 'destroy'
    ]]);
    Route::get('vehicles/mac/{mac}', 'VehicleController@showByMac');
    Route::apiResource('reminders', 'RemindersController');
  });
});
