<?php

use Illuminate\Database\Seeder;

class VariacoesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    App\Variacoes::create([
      'descricao' => 'Cores',
      'descricao_text' => '',
      'hex1' => '',
      'hex2' => '',
      'tipo' => 'Grade',
      'filtros' => 1,
      'visible' => 1,
      'ordem' => 0
    ]);
    App\Variacoes::create([
      'variacoes_id' => '1',
      'descricao' => 'Branco',
      'descricao_text' => '',
      'hex1' => '#fff',
      'hex2' => '#fff',
      'tipo' => 'Grade',
      'filtros' => 1,
      'visible' => 1,
      'ordem' => 0
    ]);
    App\Variacoes::create([
      'descricao' => 'Tamanhos',
      'descricao_text' => '',
      'hex1' => '',
      'hex2' => '',
      'tipo' => 'Grade',
      'filtros' => 1,
      'visible' => 1,
      'ordem' => 0
    ]);
    App\Variacoes::create([
      'variacoes_id' => '3',
      'descricao' => 'P',
      'descricao_text' => '',
      'hex1' => '',
      'hex2' => '',
      'tipo' => 'Grade',
      'filtros' => 1,
      'visible' => 1,
      'ordem' => 0
    ]);
    App\Variacoes::create([
      'variacoes_id' => '3',
      'descricao' => 'M',
      'descricao_text' => '',
      'hex1' => '',
      'hex2' => '',
      'tipo' => 'Grade',
      'filtros' => 1,
      'visible' => 1,
      'ordem' => 0
    ]);
  }
}