<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesEnderecosTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('clientes_enderecos', function (Blueprint $table) {
      $table->increments('id');

      $table->integer('cliente_id')->unsigned();
      $table->foreign('cliente_id')
        ->references('id')
        ->on('clientes')
        ->onUpdate('cascade')
        ->onDelete('cascade');

      $table->enum('status', ['A', 'I']);
      $table->string('nome', 20);
      $table->string('recebedor', 20)->nullable();
      $table->string('endereco', 65);
      $table->string('nr', 6);
      $table->string('bairro', 56);
      $table->string('complemento', 65);
      $table->string('referencia', 65);
      $table->string('cidade', 45);
      $table->string('uf', 2);
      $table->string('cep', 9);

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
    Schema::dropIfExists('clientes_enderecos');
  }
}