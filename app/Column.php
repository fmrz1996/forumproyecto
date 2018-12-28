<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
  protected $fillable = [
      'id', 'title', 'columnist_id', 'slug', 'body', 'user_id',
  ];

  public function columnist()
  {
    return $this->belongsTo(Columnist::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
