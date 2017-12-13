<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'hotels'], function(){
	Route::get('/', 'HotelController@index');
	Route::get('/{topic}', 'HotelController@show');
});

Route::group(['prefix' => 'cities'], function(){
	Route::get('/', 'CityController@index');
	Route::get('/{city}', 'CityController@show');
	Route::get('/slug/{city}', 'CityController@slug');
});

Route::group(['prefix' => 'districts'], function(){
	Route::get('/{district}', 'DistrictController@show');
	Route::get('/slug/{district}', 'DistrictController@slug');
});

Route::group(['prefix' => 'towns'], function(){
	Route::get('/{town}', 'TownController@show');
	Route::get('/slug/{town}', 'TownController@slug');
});