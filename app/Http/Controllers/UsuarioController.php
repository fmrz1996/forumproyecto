<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
use Auth;

class UsuarioController extends Controller
{
    public function index(Request $request){

      $request->user()->authorizeRoles(['Administrador', 'Periodista']);
      $usuarios = User::all();

      return view('admin.users/index', compact('usuarios'));
    }

    public function create(Request $request){

      $request->user()->authorizeRoles(['Administrador']);

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
        'role_id' => 2,
        'description' => $data['description'],
        'avatar' => $name,
        'password' => bcrypt($data['password']),
      ]);

      return redirect()->route('usuarios')->with('status', 'Usuario creado correctamente.');
    }

    public function edit(User $user, Request $request){

      if($user->id != Auth::user()->id){
        $request->user()->authorizeRoles(['Administrador']);
      }

      $roles = Role::all();

      return view ('admin.users.edit', ['user' => $user], compact('roles'));
    }

    public function update(User $user, Request $request){

      $data = request()->validate([
        'username' => ['required', 'unique:users,username,' .$user->id],
        'email' => ['required', 'email', 'unique:users,email,' .$user->id],
        'first_name' => 'required',
        'last_name' => 'required',
        'role_id' => 'nullable',
        'description' => ['nullable', 'max:200'],
        'is_active' => ['nullable', 'in:0,1'],
        'avatar' => 'nullable',
        'password' => ['nullable', 'confirmed', 'min:6'],
      ], [
        'username.required' => 'El campo de Usuario es obligatorio.',
        'username.unique' => 'El usuario ingresado ya está registrado.',
        'email.required' => 'El campo de Correo Electrónico es obligatorio.',
        'email.unique' => 'El correo electrónico ingresado ya está registrado.',
        'first_name.required' => 'El campo de Nombre es obligatorio.',
        'last_name.required' => 'El campo de Apellido es obligatorio.',
        'role_id.required' => 'Debe seleccionar un rol valido.',
        'description.max' => 'La descripción no puede tener más de 200 caracteres.',
        'is_active.in' => 'Debe seleccionar un estado de usuario valido.',
        'password.confirmed' => 'Las contraseñas no coinciden.',
        'password.min' => 'La contraseña debe tener por lo menos 6 caracteres.',
      ]);

      if($user->id == Auth::user()->id){
        if($data['password'] != null){
          $data['password'] = bcrypt($data['password']);
        } else {
          unset($data['password']);
        }
      }

      if(isset($data['is_active'])){
        unset($data['is_active']);
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

      return redirect()->route('usuarios.mostrar', ['user' => $user])->with('status', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $user){
      $user->delete();

      return redirect()->route('usuarios');
    }

    public function details(User $user, Request $request){

      return view('admin.users.show', compact('user'));
    }
}
