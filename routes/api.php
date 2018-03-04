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

Route::group(['prefix' => 'objects'], function(){
	Route::get('/', 'ObjectController@index');
	Route::get('/{object}', 'ObjectController@show');
	Route::get('/slug/{object}', 'ObjectController@slug');
});

Route::group(['prefix' => 'units'], function(){
	Route::get('/', 'UnitController@index');
	Route::get('/{unit}', 'UnitController@show');
	Route::get('/slug/{unit}', 'UnitController@slug');
});

Route::group(['prefix' => 'questions'], function(){
	Route::get('/', 'QuestionController@index');
	Route::get('/{question}', 'QuestionController@show');
	Route::get('/slug/{question}', 'QuestionController@slug');
});