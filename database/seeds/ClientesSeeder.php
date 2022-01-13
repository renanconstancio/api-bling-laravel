<?php

use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    App\Clientes::create([
      'nome' => str_random(10),
      'email' => str_random(10) . '@gmail.com',
      'fantasia' => '',
      'cnpj_cpf' => '',
      'ie_rg' => '',
      'fone' => '',
      'celular' => '',
      'data_nascimento' => null,
      'senha' => bcrypt('123123'),
    ], [
      'nome' => str_random(10),
      'email' => str_random(10) . '@gmail.com',
      'fantasia' => '',
      'cnpj_cpf' => '',
      'ie_rg' => '',
      'fone' => '',
      'celular' => '',
      'data_nascimento' => null,
      'senha' => bcrypt('321321'),
    ]);
  }
}