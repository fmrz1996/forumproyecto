<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriaController extends Controller
{
    public function index(){

      $categorias = Category::all();

      return view('admin.categories/index', compact('categorias', 'status'));
    }

    public function create(){

      return view('admin.categories.create');

    }

    public function store(){
      $data = request()->validate([
        'name' => ['required', 'unique:categories,name'],
      ], [
        'name.required' => 'El campo de Nombre es obligatorio.',
      ]);

      Category::create([
        'name' => $data['name'],
      ]);

      return redirect()->route('categorias');
    }

    public function edit(Category $category){
      return view ('admin.categories.edit', ['category' => $category]);
    }

    public function update(Category $category){
      $data = request()->validate([
        'name' => ['required', 'unique:categories,name,' .$category->id],
        'is_active' => 'required',
      ], [
        'name.required' => 'El campo de Nombre es obligatorio.',
        'name.unique' => 'La categoría ingresada ya está registrada.',
      ]);

      $category->update($data);

      return redirect()->route('categorias.mostrar', ['category' => $category]);
    }

    public function details(Category $category){
      return view('admin.categories.show', compact('category'));
    }

}
