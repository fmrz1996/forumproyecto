<?php

namespace App\Http\Controllers;

use App\Http\Traits\CarouselAlgorithms;
use Illuminate\Http\Request;
use App\Category;
use App\Column;
use App\Columnist;
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
      $columnists = Columnist::whereHas('columns', function($query){ $query->orderBy('created_at', 'desc');})->get()->take(3);

      return view('home', compact('categorias', 'carousel', 'columnists', 'posts'));
    }

    public function category($category)
    {
      $categorias = Category::has('posts', '>', 0)->pluck('name');

      foreach ($categorias as $cat) {
        $cat_info = Category::where('name', '=', $category)->firstOrFail();
      }

      $carousel = $this->randomDefault();
      $posts = Post::where('category_id', '=', $cat_info->id)->orderBy('id', 'desc')->paginate(10);
      $columnists = Columnist::whereHas('columns', function($query){ $query->orderBy('created_at', 'desc');})->get()->take(3);

      return view('home', compact('categorias', 'carousel', 'posts', 'category', 'columnists'));
    }

    public function tag($tag)
    {
      $categorias = Category::has('posts', '>', 0)->pluck('name');

      $carousel = $this->randomDefault();

      $tag = str_replace('-', ' ', $tag);
      $tag_value = Tag::where('name', '=', $tag)->firstOrFail()->toArray();
      $columnists = Columnist::whereHas('columns', function($query){ $query->orderBy('created_at', 'desc');})->get()->take(3);

      $posts = Post::whereHas('tags', function($query) use ($tag_value){
        $query->where('tag_id', $tag_value['id']);
      })->orderBy('id', 'desc')->paginate(10);

      return view('home', compact('categorias', 'carousel', 'posts', 'tag', 'columnists'));
    }

    public function column()
    {
      $categorias = Category::has('posts', '>', 0)->pluck('name');

      $carousel = $this->randomDefault();

      $columns = Column::orderBy('id', 'desc')->paginate(10);

      return view('column.home', compact('categorias', 'carousel', 'columns'));
    }
}
