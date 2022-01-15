<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BlingController extends Controller
{
  public function index()
  {
    $client = new \GuzzleHttp\Client();
    $response = $client->request(
      'GET',
      'https://bling.com.br/Api/v2/produtos/json?apikey=5dbe39c493b04e5048954b2898cc4e49456dfd9f42198cc3df76ffe0f17e0b1555539dcd&imagem=S&estoque=S'
    );

    $statusCode = $response->getStatusCode();
    $responseBody = json_decode($response->getBody(), true);

    $data = null;
    $group = null;


    $a = null;
    $variacoes = null;
    foreach ($responseBody['retorno']['produtos'] as $rws) {
      // if (!isset($rws['produto']['codigoPai']))

      if (!isset($rws['produto']['codigoPai'])) {
        $a = $rws['produto']['descricao'];
        // echo '<br>';
      }

      if (isset($rws['produto']['codigoPai'])) {
        $explode = explode(' ', $rws['produto']['descricao']);

        $explode_variacoes = $explode[sizeof($explode) - 1];

        $variacoes = preg_split("/[\\:\\;]+/", $explode_variacoes);

        $temp[$variacoes[0]] = [
          'nome' => $variacoes[3],
          'codigo' => '',
          'estoque' => (int)$rws['produto']['estoqueAtual'],
        ];

        $data[$variacoes[0]][] = [
          'nome' => $variacoes[1],
          'codigo' => '',
          'estoque' => (int)$rws['produto']['estoqueAtual'],
          $variacoes[2] => $temp[$variacoes[0]]
        ];
      }

      // $variacoes_explode = explode(' ', strstr($rws['produto']['descricao'], ':', true));
      // $variacoes = !empty($variacoes_explode) ? $variacoes_explode[sizeof($variacoes_explode) - 1] : null;

    }

    return response()->json($data);
  }
}