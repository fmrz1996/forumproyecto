<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Category::has('posts', '>', 0)->pluck('name');

        $posts = Post::all()->sortByDesc("id");

        return view('home', compact('categorias', 'posts'));
    }

    public function category($category)
    {
      $categorias = Category::has('posts', '>', 0)->pluck('name');

      foreach ($categorias as $cat) {
        $cat_info = Category::where('name', '=', $category)->firstOrFail();
      }

      $posts = Post::where('category_id', '=', $cat_info->id)->get()->sortByDesc("id");

      return view('home', compact('categorias', 'posts', 'category'));
    }

    public function tag($tag)
    {
      $categorias = Category::has('posts', '>', 0)->pluck('name');
      $tags = Tag::all();

      foreach ($tags as $tag_info) {
        $post_array = Tag::where('name', '=', str_replace("-", " ", $tag))->firstOrFail();
      }

      $posts = $post_array->posts;

      return view('home', compact('categorias', 'posts', 'tag'));
    }
}
