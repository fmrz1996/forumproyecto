<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

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

    public function show($category)
    {
      $categorias = Category::has('posts', '>', 0)->pluck('name');

      foreach ($categorias as $cat) {
        $cat_info = Category::where('name', '=', $category)->firstOrFail();
      }

      $posts = Post::where('category_id', '=', $cat_info->id)->get()->sortByDesc("id");

      return view('home', compact('categorias', 'posts'));
    }
}
