<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Post;
use App\User;
use Auth;

class PostController extends Controller
{
  public function index(){
    $posts = Post::all();

    return view('admin.posts/index', compact('posts'));
  }

  public function create(){
    $categorias = Category::where('is_active', '=', 1)->get();

    return view('admin.posts.create', compact('categorias'));
  }

  public function store(Request $request){
    $data = request()->validate([
      'title' => ['required', 'max:150'],
      'body' => 'required',
      'category_id' => ['required', 'not_in:0'],
      'user_id' => 'required',
      'background' => 'required',
    ], [
      'title.required' => 'El campo de Título es obligatorio.',
      'title.max' => 'El título no puede contener más de 150 caracteres.',
      'body.required' => 'El campo de Texto es obligatorio.',
      'category_id.required' => 'Debe seleccionar una categoría valida.',
      'category_id.not_in' => 'Debe seleccionar una categoría valida.',
      'background.required' => 'El post debe contener una imágen principal.',
    ]);

    if($request->hasFile('background')){
      $file = $request->file('background');
      $name = time().'-'.$file->getClientOriginalName();
      $file->move(public_path(). '/img/', $name);
    }

    Post::create([
      'title' => $data['title'],
      'body' => $data['body'],
      'category_id' => $data['category_id'],
      'user_id' => $data['user_id'],
      'background' => $name,
    ]);

    return redirect()->route('posts')->with('status', 'Post creado correctamente.');
  }

  public function edit(Post $post, Request $request){

    if($post->user->id != Auth::user()->id){
      $request->user()->authorizeRoles('Administrador');
    }

    $categorias = Category::where('is_active', '=', 1)->get();
    return view ('admin.posts.edit', ['post' => $post], compact('categorias'));
  }

  public function update(Post $post, Request $request){
    $data = request()->validate([
      'title' => ['required', 'max:150'],
      'body' => 'required',
      'category_id' => ['required', 'not_in:0'],
      'background' => 'nullable',
    ], [
      'title.required' => 'El campo de Título es obligatorio.',
      'title.max' => 'El título no puede contener más de 150 caracteres.',
      'body.required' => 'El campo de Texto es obligatorio.',
      'category_id.required' => 'Debe seleccionar una categoría valida.',
      'category_id.not_in' => 'Debe seleccionar una categoría valida.',
    ]);

    if($request->hasFile('background')){
      $file = $request->file('background');
      $name = time().'-'.$file->getClientOriginalName();
      $file->move(public_path(). '/img/', $name);
      $data['background'] = $name;
    } else {
      unset($data['background']);
    }

    $post->update($data);

    return redirect()->route('posts.mostrar', ['post' => $post])->with('status', 'Post actualizado correctamente.');
  }

    public function destroy(Post $post){
      $post->delete();

      return redirect()->route('posts')->with('status', 'Post eliminado correctamente.');
    }

  public function details(Post $post){
    return view('admin.posts.show', compact('post'));
  }
}
