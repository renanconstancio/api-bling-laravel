<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientesEnderecos extends Model
{
  protected $fillable = ['id', 'nome', 'recebedor', 'endereco', 'nr', 'bairro', 'complemento', 'referencia', 'cidade', 'uf', 'cep', 'status', 'cliente_id'];

  protected $dates = ['deleted_at'];

  function clientes()
  {
    return $this->belongsTo('App\Clientes');
  }
}