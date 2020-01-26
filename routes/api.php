<?php

use Illuminate\Http\Request;

Route::get('/movies', "MovieController@movies");
Route::post('/movie/store', "MovieController@store");
Route::post('/movie/update/{id}', "MovieController@update");
Route::post('/movie/destroy/{id}', "MoviieseController@destroy");

Route::get('/users', "UserController@users");
Route::get('/login/{email}', "UserController@login");
Route::post('/user/store', "UserController@store");
Route::post('/user/update/{id}', "UserController@update");
Route::post('/user/destroy/{id}', "UserController@destroy");
Route::get('/user/favorite/{id}', "UserController@favorites");

Route::post('/like', "UserController@like");
Route::post('/dislike', "UserController@dislike");