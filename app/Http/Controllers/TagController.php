<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Post;

class TagController extends Controller
{
    public function index(Request $request){

      $tags = Tag::all();
      $last_update = Tag::orderBy('updated_at', 'desc')->pluck('updated_at')->first();

      return view('admin.tags/index', compact('tags', 'last_update'));
    }

    public function create(Request $request){

      $tags = Tag::all();

      return view('admin.tags.create', compact('tags'));

    }

    public function store(Request $request){

      $tags = $request->tags;
      $data_tags = [];

      if($tags != null){
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
      }

      return redirect()->route('tags')->with('status', 'Tags creados correctamente.');
    }

    public function edit(Request $request, $id){

      $request->user()->authorizeRoles(['Director ejecutivo', 'Administrador']);

      $tag = Tag::find($id);

      return view ('admin.tags.edit', compact('tag'));
    }

    public function update(Tag $tag, Request $request){

      $data = request()->validate([
        'name' => ['required', 'max:30'],
      ], [
        'name.required' => 'El campo de Nombre es obligatorio.',
        'name.max' => 'El tag no puede contener más de 30 caracteres.',
      ]);

      $tag->update($data);

      return redirect()->route('tags.mostrar', ['tag' => $tag])->with('status', 'Tag actualizado correctamente.');
    }

    public function destroy(Tag $tag){
      $tag->posts()->detach();
      $tag->delete();

      return redirect()->route('tags')->with('status', 'Tag eliminado correctamente.');
    }

    public function details(Tag $tag){

      return view('admin.tags.show', compact('tag'));
    }
}
