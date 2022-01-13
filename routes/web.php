<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//   return view('welcome');
// });

Route::group(array('prefix' => 'api'), function () {

  Route::get('/', function () {
    return response()->json(['message' => 'API BLING SERVER', 'status' => 'Connected']);;
  });

  Route::resource('clientes', 'ClientesController');


  Route::get('auth/login', 'AuthController@authenticate');

  Route::post('auth/login', 'AuthController@authenticate');
});

Route::get('/', function () {
  return redirect('api');
});