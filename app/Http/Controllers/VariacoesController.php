<?php

namespace App\Http\Controllers;

use App\Variacoes;
use Illuminate\Http\Request;

class VariacoesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
    $variacoes = Variacoes::whereNull('variacoes_id')
      ->with('childrenVariacoes')
      ->get();

    if (!$variacoes) {
      return response()->json(['message' => 'Record not found'], 404);
    }

    return response()->json($variacoes);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Variacoes  $variacoes
   * @return \Illuminate\Http\Response
   */
  public function show(Variacoes $variacoes)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Variacoes  $variacoes
   * @return \Illuminate\Http\Response
   */
  public function edit(Variacoes $variacoes)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Variacoes  $variacoes
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Variacoes $variacoes)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Variacoes  $variacoes
   * @return \Illuminate\Http\Response
   */
  public function destroy(Variacoes $variacoes)
  {
    //
  }
}