<?php

namespace App\Http\Controllers;

use App\Usuarios;
use Illuminate\Http\Request;
use Validator;
use JWTAuth;

class JWTAuthController extends Controller
{
  /**
   * Create a new AuthController instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth:api', ['except' => ['login', 'register', 'store']]);
  }

  // public function store(Request $request)
  // {
  //   $credentials = $request->only('store_conn');
  //   try {
  //     if (!$token = JWTAuth::attempt($credentials)) {
  //       return response()->json(['error' => 'invalid_credentials'], 400);
  //     }
  //   } catch (JWTException $e) {
  //     return response()->json(['error' => 'could_not_create_token'], 400);
  //   }
  //   return response()->json(compact('token'));
  // }

  /**
   * Register a User.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function register(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'nome' => 'required|between:2,100',
      'email' => 'required|email|unique:usuarios|max:50',
      // 'senha' => 'required|confirmed|string|min:6|max:12',
      'senha' => 'required|min:6',
      'senha_repeat' => 'required|min:6|same:senha',
    ]);

    if ($validator->fails())
      return response()->json($validator->errors(), 422);

    $usuarios = Usuarios::create(array_merge(
      $request->all(),
      ['senha' => bcrypt($request->senha)]
    ));

    return response()->json([
      'message' => 'Successfully registered',
      'usuarios' => $usuarios
    ], 201);
  }

  /**
   * Get a JWT via given credentials.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function login(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'email' => 'required|email',
      'senha' => 'required|string|min:6|max:12',
    ]);


    if ($validator->fails()) {
      return response()->json($validator->errors(), 422);
    }

    if (!$token = auth()->attempt($validator->validated())) {
      return response()->json(['error' => 'Unauthorized'], 401);
    }

    return $this->createNewToken($token);
  }

  /**
   * Get the authenticated User.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function profile()
  {
    return response()->json(['valid' => auth()->check()]);
  }

  /**
   * Log the user out (Invalidate the token).
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function logout()
  {
    auth()->logout();

    return response()->json(['message' => 'Successfully logged out']);
  }

  /**
   * Refresh a token.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function refresh()
  {
    return $this->createNewToken(auth()->refresh());
  }

  /**
   * Get the token array structure.
   *
   * @param  string $token
   *
   * @return \Illuminate\Http\JsonResponse
   */
  protected function createNewToken($token)
  {
    return response()->json([
      'access_token' => $token,
      'token_type' => 'bearer',
      'expires_in' => auth()->factory()->getTTL() * 60
    ]);
  }

  protected function unauthenticated($request, JWTAuthController $exception)
  {
    return $request->expectsJson()
      ? response()->json(['message' => $exception->getMessage()], 401)
      : "redirect()->guest(route('ROUTENAME'))";
  }
}