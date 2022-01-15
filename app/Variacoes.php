<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variacoes extends Model
{

  //

  use SoftDeletes;

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];

  public function childrenVariacoes()
  {
    return $this->hasMany('App\Variacoes')->with('childrenVariacoes');
  }
}