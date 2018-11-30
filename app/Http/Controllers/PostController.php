<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Auth;
use Image;
use File;

class PostController extends Controller
{
  public function index(){

    $posts = Post::all();
    $tags = Tag::all();

    $last_update = Post::orderBy('updated_at', 'desc')->pluck('updated_at')->first();

    return view('admin.posts/index', compact('posts', 'tags', 'last_update'));
  }

  public function create(){

    $categorias = Category::where('is_active', '=', 1)->get();
    $tags = Tag::all();

    return view('admin.posts.create', compact('categorias', 'tags'));
  }

  public function store(Post $post, Request $request){

    $cat_array = Category::pluck('id')->toArray();
    $categories = implode(",", $cat_array);

    $data = request()->validate([
      'title' => ['required', 'max:150'],
      'slug' => ['required', 'alpha_dash', 'max:191', 'unique:posts,slug'],
      'header' => ['nullable', 'max:300'],
      'body' => 'required',
      'style' => ['required', 'in:1,2'],
      'category_id' => ['required', 'in:'. $categories],
      'background' => 'required',
    ], [
      'title.required' => 'El campo de Título es obligatorio.',
      'title.max' => 'El título no puede contener más de 150 caracteres.',
      'slug.required' => 'El campo de URL es obligatorio.',
      'slug.min' => 'La URL debe tener como minímo 5 caracteres.',
      'slug.max' => 'La URL no puede tener más de 255 caracteres.',
      'slug.unique' => 'La URL ingresada ya existe.',
      'header.max' => 'El encabezado no puede tener más de 300 caracteres.',
      'body.required' => 'El campo de Contenido es obligatorio.',
      'style.required' => 'Debe seleccionar un estilo valido.',
      'style.in' => 'Debe seleccionar un estilo valido.',
      'category_id.required' => 'Debe seleccionar una categoría valida.',
      'category_id.in' => 'Debe seleccionar una categoría valida.',
      'background.required' => 'El post debe contener una imágen principal.',
    ]);

    if($request->hasFile('background')){
      $file = $request->file('background');
      $name = time().'-'.$file->getClientOriginalName();
      if(strlen($name) > 60){
        $name = str_limit($name, 60, '.'.$request->background->getClientOriginalExtension());
      }
      //Creación de imagen
      $img = Image::make($file->getRealPath())->resize(1920, null, function ($constraint) {$constraint->aspectRatio(); $constraint->upsize();})->save(public_path(). '/img/'. $name, 80);
      //Creación de miniatura de la imagen
      $img = Image::make($file->getRealPath())->resize(650, null, function ($constraint) {$constraint->aspectRatio(); $constraint->upsize();})->save(public_path(). '/img/thumb/'. $name, 80);
      $data = array_merge($data, ['background' => 'mimes:jpg,jpeg,png']);
    }

    $post = Post::create([
      'title' => $data['title'],
      'slug' => $data['slug'],
      'header' => $data['header'],
      'body' => $data['body'],
      'style' => $data['style'],
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
      if($post->user->role->name != "Periodista"){
        $request->user()->authorizeRoles('Director ejecutivo');
      }
    }

    $categorias = Category::where('is_active', '=', 1)->get();

    $tags = Tag::all();

    return view ('admin.posts.edit', ['post' => $post], compact('categorias', 'tags'));
  }

  public function update(Post $post, Request $request){

    $cat_array = Category::pluck('id')->toArray();
    $categories = implode(",", $cat_array);

    $data = request()->validate([
      'title' => ['required', 'max:150'],
      'body' => 'required',
      'slug' => ['required', 'alpha_dash', 'max:191', 'unique:posts,slug,' .$post->id],
      'header' => ['nullable', 'max:300'],
      'style' => ['required', 'in:1,2'],
      'category_id' => ['required', 'in:'. $categories],
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
      'style.required' => 'Debe seleccionar un estilo valido.',
      'style.in' => 'Debe seleccionar un estilo valido.',
      'category_id.required' => 'Debe seleccionar una categoría valida.',
      'category_id.in' => 'Debe seleccionar una categoría valida.',
    ]);

    if($request->hasFile('background')){
      $file = $request->file('background');
      $name = time().'-'.$file->getClientOriginalName();
      if(strlen($name) > 60){
        $name = str_limit($name, 60, '.'.$request->background->getClientOriginalExtension());
      }

      if(File::exists(public_path(). '/img/'. $post->background)){
          File::delete(public_path(). '/img/'. $post->background);
      }

      if(File::exists(public_path(). '/img/thumb/'. $post->background)){
          File::delete(public_path(). '/img/thumb/'. $post->background);
      }

      $img = Image::make($file->getRealPath())->resize(1920, null, function ($constraint) {$constraint->aspectRatio(); $constraint->upsize();})->save(public_path(). '/img/'. $name, 80);
      $img = Image::make($file->getRealPath())->resize(650, null, function ($constraint) {$constraint->aspectRatio(); $constraint->upsize();})->save(public_path(). '/img/thumb/'. $name, 80);
      $data = array_merge($data, ['background' => 'mimes:jpg,jpeg,png']);
      $data['background'] = $name;
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

      $name_tags = [];

      foreach ($tags as $tag) {
        if(!in_array($tag, $name_tags, true)){
          $name_tags[] = $tag;
        }
      }

      foreach($name_tags as $tag){
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

      if(File::exists(public_path(). '/img/'. $post->background)){
          File::delete(public_path(). '/img/'. $post->background);
      }

      if(File::exists(public_path(). '/img/thumb/'. $post->background)){
          File::delete(public_path(). '/img/thumb/'. $post->background);
      }

      $post->delete();

      return redirect()->route('posts')->with('status', 'Post eliminado correctamente.');
    }

  public function details(Post $post){
    return view('admin.posts.show', compact('post'));
  }
}
