<?php

Route::namespace('Api')->group(function() {
  Route::post('login', 'AuthenticateController@authenticate');
  Route::post('refreshToken', function() {})->middleware('jwt.refresh');

  Route::middleware(['jwt.auth'])->group(function() {
    Route::apiResource('clients', 'ClientController');
    Route::apiResource('travels', 'TravelController');
    Route::apiResource('readings', 'ReadingController');
  });
});
