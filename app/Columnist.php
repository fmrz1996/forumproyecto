<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Columnist extends Model
{
  protected $fillable = [
      'id', 'name', 'occupation', 'avatar',
  ];

  public function columns()
  {
    return $this->hasMany(Column::class);
  }

  public $timestamps = false;
}
