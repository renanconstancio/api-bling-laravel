<?php
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

Route::group(array('prefix' => 'api'), function () {

  Route::get('/', function () {
    return response()->json(['message' => 'API BLING SERVER', 'status' => 'Connected']);;
  });

  Route::resource('clientes', 'ClientesController');


  // Route::get('auth/login', 'AuthController@authenticate');
  Route::post('auth/login', 'AuthController@authenticate');
});