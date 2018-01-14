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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Movies APIs
Route::get('/movies', 'MovieController@apiIndex');
Route::get('/movies/{id}', 'MovieController@apiShow');
Route::post('/movies', 'MovieController@apiStore');
Route::put('/movies/{id}', 'MovieController@apiUpdate');
Route::delete('/movies/{id}', 'MovieController@apiDelete');

// Genres APIs
Route::get('/genres', 'GenreController@apiIndex');
Route::get('/genres/{id}', 'GenreController@apiShow');
Route::post('/genres', 'GenreController@apiStore');
Route::put('/genres/{id}', 'GenreController@apiUpdate');
Route::delete('/genres/{id}', 'GenreController@apiDelete');
