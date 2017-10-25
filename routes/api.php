<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// testing via curl
// for index: curl -I http://localhost:8000/api/movies
// for show: curl -I http://localhost:8000/api/movies/8

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// index
Route::middleware('api')->get('/movies', 'MovieController@index');
// show
Route::middleware('api')->get('/movies/{id}', 'MovieController@show');
// store
Route::middleware('api')->post('/movies', 'MovieController@store');
// update
Route::middleware('api')->put('/movies/{id}', 'MovieController@update');
// delete
Route::middleware('api')->delete('/movies/{id}', 'MovieController@destroy');
