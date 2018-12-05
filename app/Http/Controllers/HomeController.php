<?php

namespace App\Http\Controllers;

use App\Http\Traits\CarouselAlgorithms;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;

class HomeController extends Controller
{
    use CarouselAlgorithms;

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
        $carousel = $this->randomDefault();
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('home', compact('categorias', 'carousel', 'posts'));
    }

    public function category($category)
    {
      $categorias = Category::has('posts', '>', 0)->pluck('name');

      foreach ($categorias as $cat) {
        $cat_info = Category::where('name', '=', $category)->firstOrFail();
      }

      $carousel = $this->randomDefault();

      $posts = Post::where('category_id', '=', $cat_info->id)->orderBy('id', 'desc')->paginate(10);

      return view('home', compact('categorias', 'carousel', 'posts', 'category'));
    }

    public function tag($tag)
    {
      $categorias = Category::has('posts', '>', 0)->pluck('name');

      $carousel = $this->randomDefault();

      $tag = str_replace('-', ' ', $tag);
      $tag_value = Tag::where('name', '=', $tag)->firstOrFail()->pluck('id')->toArray();

      $posts = Post::whereHas('tags', function($query) use ($tag_value){
        $query->where('tag_id', $tag_value);
      })->orderBy('id', 'desc')->paginate(10);

      return view('home', compact('categorias', 'carousel', 'posts', 'tag'));
    }
}
