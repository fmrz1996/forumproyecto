<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UsuarioController extends Controller
{
    public function index(){

      $usuarios = User::all();

      return view('admin.users/index', compact('usuarios'));
    }

    public function create(){

      return view('admin.users.create');

    }

    public function store(Request $request){

      $data = request()->validate([
        'username' => ['required', 'unique:users,username'],
        'email' => ['required', 'unique:users,email'],
        'first_name' => 'required',
        'last_name' => 'required',
        'description' => 'nullable',
        'avatar' => 'nullable',
        'password' => ['required', 'confirmed', 'min:6'],
      ], [
        'username.required' => 'El campo de Usuario es obligatorio.',
        'username.unique' => 'El usuario ingresado ya está registrado.',
        'email.required' => 'El campo de Correo Electrónico es obligatorio.',
        'email.unique' => 'El correo electrónico ingresado ya está registrado.',
        'first_name.required' => 'El campo de Nombre es obligatorio.',
        'last_name.required' => 'El campo de Apellido es obligatorio.',
        'password.required' => 'El campo de Contraseña es obligatorio.',
        'password.confirmed' => 'Las contraseñas no coinciden.',
        'password.min' => 'La contraseña debe tener por lo menos 6 caracteres.',
      ]);

      if($request->hasFile('avatar')){
        $file = $request->file('avatar');
        $name = time().'-'.$file->getClientOriginalName();
        $file->move(public_path(). '/img/', $name);
      } else {
        $name = null;
      }

      User::create([
        'username' => $data['username'],
        'email' => $data['email'],
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'description' => $data['description'],
        'avatar' => $name,
        'password' => bcrypt($data['password']),
      ]);

      return redirect()->route('usuarios');
    }

    public function edit(User $user){
      return view ('admin.users.edit', ['user' => $user]);
    }

    public function update(User $user, Request $request){

      $data = request()->validate([
        'username' => ['required', 'unique:users,username,' .$user->id],
        'email' => ['required', 'email', 'unique:users,email,' .$user->id],
        'first_name' => 'required',
        'last_name' => 'required',
        'description' => 'nullable',
        'avatar' => 'nullable',
        'password' => ['nullable', 'confirmed', 'min:6'],
      ], [
        'username.required' => 'El campo de Usuario es obligatorio.',
        'username.unique' => 'El usuario ingresado ya está registrado.',
        'email.required' => 'El campo de Correo Electrónico es obligatorio.',
        'email.unique' => 'El correo electrónico ingresado ya está registrado.',
        'first_name.required' => 'El campo de Nombre es obligatorio.',
        'last_name.required' => 'El campo de Apellido es obligatorio.',
        'password.confirmed' => 'Las contraseñas no coinciden.',
        'password.min' => 'La contraseña debe tener por lo menos 6 caracteres.',
      ]);

      if($data['password'] != null){
        $data['password'] = bcrypt($data['password']);
      } else {
        unset($data['password']);
      }

      if($request->hasFile('avatar')){
        $file = $request->file('avatar');
        $name = time().'-'.$file->getClientOriginalName();
        $file->move(public_path(). '/img/', $name);
        $data['avatar'] = $name;
      } else {
        unset($data['avatar']);
      }

      if($request->has('deleteAvatar')){
        $data['avatar'] = null;
      }

      $user->update($data);

      return redirect()->route('usuarios.mostrar', ['user' => $user]);
    }

    public function destroy(User $user){
      $user->delete();

      return redirect()->route('usuarios');
    }

    public function details(User $user){

      return view('admin.users.show', compact('user'));

    }
}
