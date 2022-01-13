<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('clientes', function (Blueprint $table) {
      $table->increments('id');

      $table->string('email', 60)->unique();
      $table->boolean('email_cofirm')->nullable();

      $table->string('senha', 65);
      $table->string('senha_reset', 65)->nullable();

      $table->string('nome', 80);
      $table->string('fantasia', 100);

      $table->string('cnpj_cpf', 18);
      $table->string('ie_rg', 18);

      $table->string('fone', 15);
      $table->string('celular', 15);

      $table->date('data_nascimento')->nullable(true);
      $table->decimal('limite_credito', 10, 2)->nullable();

      // F	Feminino
      // M	Masculino
      // N	Ñ Informado
      $table->enum('sexo', ['N', 'M', 'F']);

      // F	Pessoa Física
      // J	Pessoa Jurídica
      // E	Estrangeiro
      $table->enum('tipo_pessoa', ['F', 'J', 'E']);
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
    Schema::dropIfExists('clientes');
  }
}