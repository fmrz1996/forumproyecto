<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class NoticiaController extends Controller
{
    public function index($category, $slug, $id){

      $categorias = Category::has('posts', '>', 0)->pluck('name');

      foreach ($categorias as $cat) {
        $cat_info = Category::where('name', '=', $category)->firstOrFail();
      }

      $post = Post::where('category_id', '=', $cat_info->id)
                  ->where('id', '=', $id)
                  ->firstOrFail();

      if($slug != $post->slug)
      {
        return redirect()->route('noticia', ['category' => str_slug($post->category->name), 'slug' => $post->slug, 'id' => $post->id]);
      }

      return view('noticia', compact('post', 'categorias'));
    }
}
