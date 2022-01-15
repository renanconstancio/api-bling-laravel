<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosSkusesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('produtos_skus', function (Blueprint $table) {
      $table->increments('id');

      $table->integer('produtos_id')->unsigned()->nullable();
      $table->foreign('produtos_id')
        ->references('id')
        ->on('produtos')
        ->onUpdate('cascade')
        ->onDelete('cascade');

      $table->string('codigo', 20);
      $table->string('codigo_referencia', 35);

      $table->decimal('preco_custo', 8, 2)->nullable();
      $table->decimal('preco_venda', 8, 2)->nullable();
      $table->decimal('preco_promo', 8, 2)->nullable();

      $table->boolean('visible');
      $table->integer('ordem');
      $table->timestamps();
      $table->softDeletes();

      $table->index(['codigo', 'codigo_refencia']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('produtos_skus');
  }
}