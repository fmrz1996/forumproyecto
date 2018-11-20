<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class CategoriaController extends Controller
{
    public function index(Request $request){

      $categorias = Category::all();

      return view('admin.categories/index', compact('categorias'));
    }

    public function create(Request $request){

      $request->user()->authorizeRoles(['Director ejecutivo', 'Administrador']);

      return view('admin.categories.create');

    }

    public function store(Request $request){
      $data = request()->validate([
        'name' => ['required', 'unique:categories,name', 'max:50'],
      ], [
        'name.required' => 'El campo de Nombre es obligatorio.',
        'name.unique' => 'La categoría ingresada ya existe.',
        'name.max' => 'La categoría no puede tener más de 50 caracteres.',
      ]);

      $data['name'] = preg_replace('/\s/', '', ucfirst(strtolower($request->name)));

      Category::create([
        'name' => $data['name'],
      ]);

      return redirect()->route('categorias')->with('status', 'Categoría creada correctamente.');
    }

    public function edit(Category $category, Request $request){

      $request->user()->authorizeRoles(['Director ejecutivo', 'Administrador']);

      return view ('admin.categories.edit', ['category' => $category]);
    }

    public function update(Category $category){
      $data = request()->validate([
        'name' => ['required', 'not_in:admin,Admin', 'max:50', 'unique:categories,name,' .$category->id],
        'is_active' => ['required', 'in:0,1'],
      ], [
        'name.required' => 'El campo de Nombre es obligatorio.',
        'name.not_in' => 'La categoría ingresada ya existe.',
        'name.unique' => 'La categoría ingresada ya existe.',
        'name.max' => 'La categoría no puede tener más de 50 caracteres.',
        'is_active.required' => 'Debe seleccionar un estado de categoría valido.',
        'is_active.in' => 'Debe seleccionar un estado de categoría valido.',
      ]);

      $data['name'] = preg_replace('/\s/', '', ucfirst(strtolower(request()->name)));

      $category->update($data);

      return redirect()->route('categorias.mostrar', ['category' => $category])->with('status', 'Categoría actualizada correctamente.');
    }

    public function details(Category $category, Request $request){

      return view('admin.categories.show', compact('category'));
    }

}
