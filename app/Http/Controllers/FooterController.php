<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class FooterController extends Controller
{
  public function aboutus(){

    $categorias = Category::has('posts', '>', 0)->pluck('name');

    return view('nosotros', compact('categorias'));
  }

  public function adversting(){

    $categorias = Category::has('posts', '>', 0)->pluck('name');

    return view('nosotros', compact('categorias'));
  }

  public function termsandcond(){

    $categorias = Category::has('posts', '>', 0)->pluck('name');

    return view('nosotros', compact('categorias'));
  }

  public function contact(){

    $categorias = Category::has('posts', '>', 0)->pluck('name');

    return view('contacto', compact('categorias'));
  }
}
