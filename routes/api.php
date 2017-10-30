<?php

Route::namespace('Api')->group(function() {
  Route::post('login', 'AuthenticateController@authenticate');
  Route::post('refreshToken', function() {})->middleware('jwt.refresh');

  Route::middleware(['jwt.auth'])->group(function() {
    Route::apiResource('clients', 'ClientController');
    Route::apiResource('travels', 'TravelController');
    // Route::get('travels/{travel}/readings', 'ReadingController@index');
    // Route::post('travels/{travel}/readings', 'ReadingController@store');
    // Route::get('readings/{reading}', 'ReadingController@show');
  });
});
