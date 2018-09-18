<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(){

      if(request()->has('empty')){
        $usuarios = [];
      } else {
        $usuarios = [
          'Pipo',
          'Jorge',
          'Pedrito',
          'Ñioque',
          'Fernanda',
        ];
      }

      $titulo = 'Listado de Usuarios';

      return view('usuario', compact('titulo', 'usuarios'));
    }

    public function show($id){
      return "Mostrando detalle del usuario: {$id}";
    }

    public function create(){
      return 'Crear nuevo usuario';
    }
}
