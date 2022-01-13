<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
  protected $fillable = ['email', 'email_cofirm', 'nome', 'fantasia', 'cnpj_cpf', 'ie_rg', 'fone', 'celular', 'data_nascimento', 'limite_credito', 'senha', 'senha_reset'];

  protected $hidden = ['senha', 'senha_reset', 'email_cofirm'];

  protected $dates = ['deleted_at'];

  public function enderecos()
  {
    return $this->hasMany('App\ClientesEnderecos');
  }
}