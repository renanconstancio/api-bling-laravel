<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class RenameClienteIdTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    // Schema::table('clientes_enderecos', function (Blueprint $table) {
    //   // $table->renameColumn('cliente_id', 'clientes_id');
    // });
    DB::statement('ALTER TABLE `clientes_enderecos` CHANGE `cliente_id` `clientes_id` INT(10) UNSIGNED NOT NULL;');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    // Schema::dropIfExists('clientes_enderecos');
  }
}