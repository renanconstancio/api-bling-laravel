<?php

namespace App\Http\Controllers;


use App\Clientes;
use App\Http\Requests\AuthenticateRequest;
use JWTAuth;
use Hash;
use Validator;

class AuthController extends Controller
{
  //
  public function authenticate(AuthenticateRequest $request)
  {
    // // Get only email and password from request
    $credentials = $request->only('email', 'senha');

    // $validator = Validator::make($credentials, [
    //   'senha' => 'required',
    //   'email' => 'required'
    // ]);

    // if ($validator->fails()) {
    //   return response()->json([
    //     'message'   => 'Invalid credentials',
    //     'errors'        => $validator->errors()->all()
    //   ], 422);
    // }

    // Get user by email
    $clientes = Clientes::where('email', $credentials['email'])->first();

    // Validate Company
    if (!$clientes) {
      return response()->json([
        'error' => 'Invalid credentials'
      ], 401);
    }

    // Validate Password
    if (!Hash::check($credentials['senha'], $clientes->senha)) {
      return response()->json([
        'error' => 'Invalid credentials'
      ], 401);
    }

    // Generate Token
    $token = JWTAuth::fromUser($clientes);

    // Get expiration time
    $objectToken = JWTAuth::setToken($token);
    $expiration = JWTAuth::decode($objectToken->getToken())->get('exp');

    return response()->json([
      'access_token' => $token,
      'token_type' => 'bearer',
      'expires_in' => $expiration
    ]);
  }
}