<?php

Route::namespace('Api')->group(function() {
  Route::post('login', 'AuthenticateController@authenticate');
  Route::post('refreshToken', function() {})->middleware('jwt.refresh');

  Route::middleware(['jwt.auth'])->group(function() {
    // Route::resource('clients', 'ClientController');
    Route::get('clients/{id}', 'ClientController@show');
    Route::get('travels/{id}/readings', 'ReadingController@index');
    Route::post('travels/{id}/readings', 'ReadingController@store');
    Route::get('readings/{id}', 'ReadingController@show');
  });
});
