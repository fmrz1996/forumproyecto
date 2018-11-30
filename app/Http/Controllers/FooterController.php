<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Mail;

class FooterController extends Controller
{
  public function aboutus(){

    $categorias = Category::has('posts', '>', 0)->pluck('name');

    return view('nosotros', compact('categorias'));
  }

  public function termsandcond(){

    $categorias = Category::has('posts', '>', 0)->pluck('name');

    return view('terminos', compact('categorias'));
  }

  public function contact(){

    $categorias = Category::has('posts', '>', 0)->pluck('name');

    return view('contacto', compact('categorias'));
  }

  public function emailStore(Request $request){
    $this->validate($request, [
      'name' => 'required',
      'email' => 'required|email',
      'message' => 'required'
    ]);

    $data['name'] = $request->name;
    $data['email'] = $request->email;
    $data['msg'] = $request->message;

    Mail::send('vendor.notifications.contact', $data, function($mail) use($request){
        $mail->from('pepe.pera.tester@gmail.com', $request->name);
        $mail->to('fmrz1996@gmail.com')->subject('Correo de contacto');
    });

    return redirect()->back()->with('flash_message', '¡Gracias por tu mensaje, pronto nos contactaremos contigo!');
  }
}
