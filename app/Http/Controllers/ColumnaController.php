<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Column;
use App\Columnist;
use DB;
use Image;
use Auth;

class ColumnaController extends Controller
{
  public function index(){
    $columns = Column::all();

    return view('admin.columns.index', compact('columns'));
  }

  public function create(){

    $columnists = Columnist::all();

    return view('admin.columns.create', compact('columnists'));
  }

  public function store(Column $column, Columnist $columnist, Request $request){
    $data = request()->validate([
      'title' => ['required', 'max:150'],
      'slug' => ['required', 'alpha_dash', 'max:191', 'unique:columns,slug'],
      'columnist_id' => 'required',
      'body' => 'required',
    ], [
      'title.required' => 'El campo de Título es obligatorio.',
      'title.max' => 'El título no puede contener más de 150 caracteres.',
      'slug.required' => 'El campo de URL es obligatorio.',
      'slug.max' => 'La URL no puede tener más de 255 caracteres.',
      'slug.unique' => 'La URL ingresada ya existe.',
      'columnist_id.required' => 'Debe seleccionar un columnista.',
      'body.required' => 'El campo de Contenido es obligatorio.',
    ]);

    $column = Column::create([
      'title' => $data['title'],
      'slug' => $data['slug'],
      'columnist_id' => $data['columnist_id'],
      'body' => $data['body'],
      'user_id' => Auth::user()->id,
    ]);

    return redirect()->route('columnas')->with('status', 'Columna creada correctamente.');
  }

  public function edit(Column $column, Request $request){
    if($column->user->id != Auth::user()->id){
      if($column->user->role->name != "Periodista"){
        $request->user()->authorizeRoles('Director ejecutivo');
      }
    }

    $columnists = Columnist::all();

    return view('admin.columns.edit', ['column' => $column], compact('columnists'));
  }

  public function update(Column $column, Request $request){
    $data = request()->validate([
      'title' => ['required', 'max:150'],
      'slug' => ['required', 'alpha_dash', 'max:191', 'unique:columns,slug,' .$column->id],
      'columnist_id' => 'required',
      'body' => 'required',
    ], [
      'title.required' => 'El campo de Título es obligatorio.',
      'title.max' => 'El título no puede contener más de 150 caracteres.',
      'slug.required' => 'El campo de URL es obligatorio.',
      'slug.max' => 'La URL no puede tener más de 191 caracteres.',
      'slug.unique' => 'La URL debe ser única.',
      'columnist_id.required' => 'Debe seleccionar un columnista.',
      'body.required' => 'El campo de Contenido es obligatorio.',
    ]);

    $column->update($data);

    return redirect()->route('columnas.mostrar', ['column' => $column])->with('status', 'Columna actualizada correctamente.');
  }

  public function destroy(Column $column){
    $column->delete();

    return redirect()->route('columnas')->with('status', 'Columna eliminada correctamente.');
  }

  public function details(Column $column){

    return view('admin.columns.show', compact('column'));
  }
}
