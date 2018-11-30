<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'id', 'title', 'header', 'body', 'slug', 'style', 'category_id', 'user_id', 'background',
    ];

    public function category()
    {
      return $this->belongsTo(Category::class);
    }

    public function tags()
    {
      return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
