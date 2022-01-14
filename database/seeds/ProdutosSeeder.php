<?php

use Illuminate\Database\Seeder;

class ProdutosSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //
    App\Produtos::create([
      'codigo' => str_random(20),
      'descricao' => str_random(20),
      'descricao_curta' => str_random(20),
      'descricao_complementar' => str_random(20),
      'situacao' => 'A'
    ]);
    //
    App\Produtos::create([
      'codigo' => str_random(20),
      'descricao' => str_random(20),
      'descricao_curta' => str_random(20),
      'descricao_complementar' => str_random(20),
      'situacao' => 'S'
    ]);
    App\Produtos::create([
      'codigo' => str_random(20),
      'descricao' => str_random(20),
      'descricao_curta' => str_random(20),
      'descricao_complementar' => str_random(20),
      'situacao' => 'I'
    ]);
  }
}