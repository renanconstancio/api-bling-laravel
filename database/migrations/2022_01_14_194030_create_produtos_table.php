<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('produtos', function (Blueprint $table) {
      $table->increments('id');

      $table->string('codigo', 25)->nullable();
      $table->string('descricao', 25)->nullable();
      $table->text('descricao_curta')->nullable();
      $table->text('descricao_complementar')->nullable();



      // A Ativo
      // S standby
      // I nativo
      $table->enum('situacao', ['A', 'S', 'I']);
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('produtos');
  }
}