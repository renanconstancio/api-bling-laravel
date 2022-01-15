<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => '{connection}'], function () {
  Route::get('/', function () {
    return response()->json([
      'message' => 'API BLING SERVER - set connection to web',
      'status' => 'Connected'
    ]);
  });

  Route::get('store', 'JWTAuthController@store')->name('store');

  Route::get('login', 'JWTAuthController@login')->name('login');
  Route::post('login', 'JWTAuthController@login')->name('login');

  Route::get('register', 'JWTAuthController@register')->name('register');
  Route::post('register', 'JWTAuthController@register')->name('register');


  Route::resource('bling', 'BlingController');

  Route::resource('variacoes', 'VariacoesController');

  Route::resource('produtos', 'ProdutosController');


  // Route::get('store', function () {
  //   return response()->json([
  //     'message' => 'API BLING SERVER - set connection to web',
  //     'status' => 'Connected'
  //   ]);
  // });
});

Route::get('/', function () {
  return response()->json([
    'message' => 'API BLING SERVER - set connection to web',
    'status' => 'Connected'
  ]);
});


// Route::group('/{connection}', function ($connection) {
//   Route::get('/store', 'JWTAuthController@store')->name('store');
//   return response()->json([
//     'message' => 'API BLING SERVER',
//     'status' => 'Connected'
//   ]);
// });


// Route::get('/{connection}', function ($connection) {
//   Route::get('/store', 'JWTAuthController@store')->name('store');
//   return response()->json([
//     'message' => 'API BLING SERVER',
//     'status' => 'Connected'
//   ]);
// });

// Route::group([
//   'middleware' => 'api',
//   'prefix' => 'auth'
// ], function () {

//   Route::post('register', 'JWTAuthController@register')->name('register');

//   Route::get('login', 'JWTAuthController@login')->name('login');
//   Route::post('login', 'JWTAuthController@login')->name('login');

//   Route::post('logout', 'JWTAuthController@logout')->name('logout');
//   Route::post('refresh', 'JWTAuthController@refresh')->name('refresh');

//   Route::get('profile', 'JWTAuthController@profile')->name('profile');
//   Route::get('store', 'JWTAuthController@store')->name('store');

//   Route::get('/', function () {
//     return response()->json(['message' => 'API BLING SERVER', 'status' => 'Connected']);;
//   });
// });

// Route::group([
//   'middleware' => 'api',
//   'prefix' => 'produtos'
// ], function ($router) {

//   // Route::post('register', 'JWTAuthController@register');
//   // Route::post('login', 'JWTAuthController@login');
//   // Route::post('logout', 'JWTAuthController@logout');
//   // Route::post('refresh', 'JWTAuthController@refresh');
//   // Route::get('profile', 'JWTAuthController@profile');

//   Route::get('/', function () {
//     return 'sdfasdf';
//   });
// });
// Route::get('/', function () {
//   return 'sdfasdf';
// });