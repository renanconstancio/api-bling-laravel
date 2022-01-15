<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVariacoesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('variacoes', function (Blueprint $table) {
      $table->increments('id');

      $table->integer('variacoes_id')->unsigned()->nullable();
      $table->foreign('variacoes_id')
        ->references('id')
        ->on('variacoes')
        ->onUpdate('cascade')
        ->onDelete('cascade');

      $table->string('descricao', 100);
      $table->text('descricao_text');
      $table->string('hex1', 7);
      $table->string('hex2', 7);
      $table->enum('tipo', ['Menus', 'Grade', 'Outros']);
      $table->boolean('filtros');
      $table->boolean('visible');
      $table->integer('ordem');
      $table->timestamps();
      $table->softDeletes();

      $table->index(['filtros', 'visible', 'ordem']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('variacoes');
  }
}