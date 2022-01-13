<?php

namespace App\Http\Controllers;

use App\Clientes;
use Illuminate\Http\Request;
use Validator;

class ClientesController extends Controller
{
  public function __construct()
  {
    $this->middleware('jwt.auth', ['except' => ['index', 'show', 'store']]);
  }

  // Validator Method
  protected function clientesValidator($request)
  {
    $validator = Validator::make($request->all(), [
      'nome' => 'required|max:100',
      'email' => 'required|email|unique:companies'
    ]);

    return $validator;
  }

  // Lista data
  public function index(Request $request)
  {
    $clientes = Clientes::with('enderecos');

    if ($request->filled('email'))
      $clientes->orWhere('email', '=', $request->email);

    if ($request->filled('nome'))
      $clientes->orWhere('nome', 'like', $request->nome);

    if ($request->filled('cnpj_cpf'))
      $clientes->orWhere('cnpj_cpf', 'like', $request->cnpj_cpf);

    if ($request->filled('fone'))
      $clientes->orWhere('fone', 'like', $request->fone);

    $per_page = $request->filled('per_page') &&  $request->per_page != 25 ? (int)$request->per_page : 25;

    $resp = $clientes->orderby('nome', 'asc')->paginate($per_page);

    return response()->json($resp);
  }


  // ID
  public function show($id)
  {
    $clientes = Clientes::with('enderecos')->find($id);

    if (!$clientes) {
      return response()->json([
        'message'   => 'Record not found',
      ], 404);
    }

    return response()->json($clientes);
  }

  public function store(Request $request)
  {
    $validator = $this->clientesValidator($request);

    if ($validator->fails()) {
      return response()->json([
        'message'   => 'Validation Failed',
        'errors'        => $validator->errors()
      ], 422);
    }

    $clientes = new Clientes();
    $clientes->setConnection('api_bling');
    $clientes->fill($request->all());
    $clientes->save();

    return response()->json($request->all(), 201);
  }

  public function update(Request $request, $id)
  {
    $clientes = Clientes::find($id);

    if (!$clientes) {
      return response()->json([
        'message'   => 'Record not found',
      ], 404);
    }

    $clientes->fill($request->all());
    $clientes->save();

    return response()->json($clientes);
  }

  public function destroy($id)
  {
    $clientes = Clientes::find($id);

    if (!$clientes) {
      return response()->json([
        'message'   => 'Record not found',
      ], 404);
    }

    $clientes->delete();
  }
}