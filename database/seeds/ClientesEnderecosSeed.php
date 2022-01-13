<?php

use Illuminate\Database\Seeder;

class ClientesEnderecosSeed extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    App\ClientesEnderecos::create([
      'cliente_id' => 1,
      'nome' => str_random(10),
      'recebedor' => str_random(10),
      'endereco' => str_random(10),
      'bairro' => str_random(10),
      'complemento' => '',
      'referencia' => '',
      'nr' => '123456',
      'cidade' => 'Itápolis',
      'uf' => 'SP',
      'cep' => '14900-000',
      'status' => 'A',
    ]);
  }
}