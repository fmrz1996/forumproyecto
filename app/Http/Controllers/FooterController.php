<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooterController extends Controller
{
  public function aboutus(){
    return view('nosotros');
  }

  public function adversting(){
    return view('nosotros');
  }

  public function termsandcond(){
    return view('nosotros');
  }

  public function contact(){
    return view('contacto');
  }
}
