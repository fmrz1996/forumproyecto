<?php

namespace App\Http\Controllers;

use App\Http\Traits\CarouselAlgorithms;
use Illuminate\Http\Request;
use App\Category;

class SearchController extends Controller
{
    use CarouselAlgorithms;

    public function index(Request $request){

      $query = $request->get('q');
      $carousel = $this->randomDefault();
      $categorias = Category::has('posts', '>', 0)->pluck('name');

      return view('busqueda', compact('categorias', 'carousel', 'query'));
    }
}
