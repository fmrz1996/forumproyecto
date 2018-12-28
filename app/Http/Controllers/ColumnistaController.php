<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Columnist;
use Image;
use Auth;

class ColumnistaController extends Controller
{
  public function index(){

    $columnists = Columnist::all();

    return view('admin.columnists.index', compact('columnists'));
  }

  public function create(){
    if(Auth::user()->role->name == "Periodista"){
      request()->user()->authorizeRoles(['Director ejecutivo', 'Administrador']);
    }

    return view('admin.columnists.create');
  }

  public function store(Columnist $columnist, Request $request){
    $data = request()->validate([
      'name' => ['required', 'max:150'],
      'occupation' => ['nullable', 'max:150'],
      'avatar' => 'nullable',
    ], [
      'name.required' => 'El campo de Nombre es obligatorio.',
      'name.max' => 'El nombre no puede contener más de 150 caracteres.',
      'occupation.max' => 'La ocupación no puede contener más de 150 caracteres.',
    ]);

    if($request->hasFile('avatar')){
      $file = $request->file('avatar');
      $name = time().'-'.$file->getClientOriginalName();
      if(strlen($name) > 60){
        $name = str_limit($name, 60, '.'.$request->avatar->getClientOriginalExtension());
      }
      $img = Image::make($file->getRealPath())->fit(200)->save(public_path(). '/img/columnists/'. $name);
    } else {
      $name = null;
    }

    $column = Columnist::create([
      'name' => $data['name'],
      'occupation' => $data['occupation'],
      'avatar' => $name,
    ]);

    return redirect()->route('columnistas')->with('status', 'Columnista creado correctamente.');
  }

  public function edit(Columnist $columnist, Request $request){
    if(Auth::user()->role->name == "Periodista"){
      request()->user()->authorizeRoles(['Director ejecutivo', 'Administrador']);
    }

    return view('admin.columnists.edit', ['columnist' => $columnist]);
  }

  public function update(Columnist $columnist, Request $request){
    $data = request()->validate([
      'name' => ['required', 'max:150'],
      'occupation' => ['nullable', 'max:150'],
      'avatar' => 'nullable',
    ], [
      'name.required' => 'El campo de Nombre es obligatorio.',
      'name.max' => 'El nombre no puede contener más de 150 caracteres.',
      'occupation.max' => 'La ocupación no puede contener más de 150 caracteres.',
    ]);

    if($request->hasFile('avatar')){
      $file = $request->file('avatar');
      $name = time().'-'.$file->getClientOriginalName();
      if(strlen($name) > 60){
        $name = str_limit($name, 60, '.'.$request->avatar->getClientOriginalExtension());
      }
      $img = Image::make($file->getRealPath())->fit(200)->save(public_path(). '/img/columnists/'. $name);
      $data['avatar'] = $name;
    } else {
      unset($data['avatar']);
    }

    if($request->has('deleteAvatar')){
      $data['avatar'] = null;
      if(File::exists(public_path(). '/img/columnists/'. $columnist->avatar)){
          File::delete(public_path(). '/img/columnists/'. $columnist->avatar);
      }
    }

    $columnist->update($data);

    return redirect()->route('columnistas.mostrar', ['columnist' => $columnist])->with('status', 'Columnista actualizado correctamente.');
  }

  public function details(Columnist $columnist){

    return view('admin.columnists.show', compact('columnist'));
  }
}
