<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function index(Request $request){

      $request->user()->authorizeRoles(['Administrador', 'Periodista']);
      $tags = Tag::all();

      return view('admin.tags/index', compact('tags'));
    }

    public function create(Request $request){

      $request->user()->authorizeRoles(['Administrador', 'Periodista']);
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

      return redirect()->route('tags')->with('status', 'Tag creado correctamente.');
    }

    public function edit(Request $request, $id){

      $request->user()->authorizeRoles('Administrador');

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

    public function details($id){
      $tag = Tag::find($id);
      return view('admin.tags.show', compact('tag'));
    }
}
