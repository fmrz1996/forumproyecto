<?php

namespace App\Http\Controllers;

use App\Http\Traits\CarouselAlgorithms;
use Illuminate\Http\Request;
use App\Category;
use App\Columnist;

class SearchController extends Controller
{
    use CarouselAlgorithms;

    public function index(Request $request){

      $query = $request->get('q');
      $carousel = $this->randomDefault();
      $categorias = Category::has('posts', '>', 0)->pluck('name');
      $columnists = Columnist::whereHas('columns', function($query){ $query->orderBy('created_at', 'desc');})->get()->take(3);

      return view('busqueda', compact('categorias', 'carousel', 'query', 'columnists'));
    }
}
