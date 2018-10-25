<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Auth;

class PostController extends Controller
{
  public function index(){

    $posts = Post::all();
    $tags = Tag::all();

    return view('admin.posts/index', compact('posts', 'tags'));
  }

  public function create(){

    $categorias = Category::where('is_active', '=', 1)->get();
    $tags = Tag::all();

    return view('admin.posts.create', compact('categorias', 'tags'));
  }

  public function store(Post $post, Request $request){

    $data = request()->validate([
      'title' => ['required', 'max:150'],
      'slug' => ['required', 'alpha_dash', 'min:5', 'max:255'],
      'header' => ['nullable', 'max:300'],
      'body' => 'required',
      'category_id' => ['required', 'not_in:0'],
      'background' => 'required',
    ], [
      'title.required' => 'El campo de Título es obligatorio.',
      'title.max' => 'El título no puede contener más de 150 caracteres.',
      'slug.required' => 'El campo de URL es obligatorio.',
      'slug.min' => 'La URL debe tener como minímo 5 caracteres.',
      'slug.max' => 'La URL no puede tener más de 255 caracteres.',
      'header.max' => 'El encabezado no puede tener más de 300 caracteres.',
      'body.required' => 'El campo de Texto es obligatorio.',
      'category_id.required' => 'Debe seleccionar una categoría valida.',
      'category_id.not_in' => 'Debe seleccionar una categoría valida.',
      'background.required' => 'El post debe contener una imágen principal.',
    ]);

    if($request->hasFile('background')){
      $file = $request->file('background');
      $name = time().'-'.$file->getClientOriginalName();
      $file->move(public_path(). '/img/', $name);
      $data = array_merge($data, ['background' => 'mimes:jpg,jpeg,png']);
    }

    $post = Post::create([
      'title' => $data['title'],
      'slug' => $data['slug'],
      'header' => $data['header'],
      'body' => $data['body'],
      'category_id' => $data['category_id'],
      'user_id' => Auth::user()->id,
      'background' => $name,
    ]);

    $tags = $request->tags;

    //Se insertan a la tabla SOLO los tags que no existen en la BDD.
    if($tags != null){
      $data_tags = [];
      foreach ($tags as $value) {
        $tag_exists = Tag::where('name', '=', $value)->first();
        if($tag_exists === null){
          $data_tags[] = [
            'name' => $value,
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
          ];
        }
      }

      Tag::insert($data_tags);

      $id_tags = [];

      //Se obtienen los ID de todos los tags, por medio del nombre, y se guardan en un Array.
      foreach ($tags as $tag) {
        $tag_info = Tag::where('name', '=', $tag)->get();
        foreach ($tag_info as $info) {
          $id_tags[] = [
            'tag_id' => $info->id,
          ];
        }
      }
      //Por ultimo, se sincronizan todos los ID.
      $post->tags()->sync($id_tags, false);
    }

    return redirect()->route('posts')->with('status', 'Post creado correctamente.');
  }

  public function edit(Post $post, Request $request){

    if($post->user->id != Auth::user()->id){
      $request->user()->authorizeRoles('Administrador');
    }

    $categorias = Category::where('is_active', '=', 1)->get();

    $tags = Tag::all();
    $tags_array = array();
    foreach ($tags as $tag) {
      $tags_array[$tag->id] = $tag->name;
    }

    return view ('admin.posts.edit', ['post' => $post], compact('categorias', 'tags'));
  }

  public function update(Post $post, Request $request){
    $data = request()->validate([
      'title' => ['required', 'max:150'],
      'body' => 'required',
      'slug' => ['required', 'alpha_dash', 'min:5', 'max:255', 'unique:posts,slug,' .$post->id],
      'header' => ['nullable', 'max:300'],
      'category_id' => ['required', 'not_in:0'],
      'background' => 'nullable',
    ], [
      'title.required' => 'El campo de Título es obligatorio.',
      'title.max' => 'El título no puede contener más de 150 caracteres.',
      'body.required' => 'El campo de Texto es obligatorio.',
      'slug.required' => 'El campo de URL es obligatorio.',
      'slug.min' => 'La URL debe tener como minímo 5 caracteres.',
      'slug.max' => 'La URL no puede tener más de 255 caracteres.',
      'slug.unique' => 'La URL debe ser única.',
      'header.max' => 'El encabezado no puede tener más de 300 caracteres.',
      'category_id.required' => 'Debe seleccionar una categoría valida.',
      'category_id.not_in' => 'Debe seleccionar una categoría valida.',
    ]);

    if($request->hasFile('background')){
      $file = $request->file('background');
      $name = time().'-'.$file->getClientOriginalName();
      $file->move(public_path(). '/img/', $name);
      $data['background'] = $name;
      $data = array_merge($data, ['background' => 'mimes:jpg,jpeg,png']);
    } else {
      unset($data['background']);
    }

    $post->update($data);

    $tags = $request->tags;

    $id_tags = [];

    if($tags != null){
      $data_tags = [];
      foreach ($tags as $value) {
        $tag_exists = Tag::where('name', '=', $value)->first();
        if($tag_exists === null){
          $data_tags[] = [
            'name' => $value,
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
          ];
        }
      }
      if($data_tags !== null){
        Tag::insert($data_tags);
      }

      foreach ($tags as $tag) {
        $tag_info = Tag::where('name', '=', $tag)->first();
        $id_tags[] = [
          'tag_id' => $tag_info->id,
        ];
      }
    }

    if(isset($request->tags)){
      $post->tags()->sync(array()); //Arreglado a la mala
      $post->tags()->sync($id_tags);
    } else {
      $post->tags()->sync(array());
    }

    return redirect()->route('posts.mostrar', ['post' => $post])->with('status', 'Post actualizado correctamente.');
  }

    public function destroy(Post $post){
      $post->tags()->detach();
      $post->delete();

      return redirect()->route('posts')->with('status', 'Post eliminado correctamente.');
    }

  public function details(Post $post){
    return view('admin.posts.show', compact('post'));
  }
}
