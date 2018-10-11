    @extends('admin.layout')

    @section('content')
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Inicio</a>
        </li>
        <li class="breadcrumb-item">
          <a href="/admin/posts">Posts</a>
        </li>
        <li class="breadcrumb-item active">Editar</li>
      </ol>

      @if($errors->any())
        <div class="alert alert-danger">
          <h5>Porfavor corrige los siguientes erorres:</h5>
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Post #{{ $post->id }}</div>
        <div class="card-body">
          <form class="" action="{{ url("admin/posts/detalles/{$post->id}") }}" method="post" enctype="multipart/form-data">
            {{ method_field('put') }}
            {{ csrf_field() }}
            <div class="form-group">
              <div class="form-group">
                <div class="form-label-group">
                  <input name="title" type="text" id="inputTitle" class="form-control" value="{{ old('title', $post->title) }}" placeholder="Título" required="required">
                  <label for="inputTitle">Título</label>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <select class="form-control" name="category_id">
                      <option value="0">Seleccione una categoría...</option>
                      @foreach ($categorias as $category)
                        <option value="{{ $category->id }}" @if($errors->any()) {{ old('category_id') == $category->id ? 'selected=selected' : '' }} @else {{ $category->id == $post->category->id ? 'selected=selected' : '' }} @endif>
                          {{ $category->name }}
                        </option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label>Autor: {{ $post->user->first_name }} {{ $post->user->last_name }}</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input name="background" type="file" id="inputBackground" value="{{ old('background') }}"></input>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <textarea name="body" id="inputBody" class="form-control" placeholder="Escriba su contenido..." rows="10" required="required">{{ old('body', $post->body) }}</textarea>
              </div>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Actualizar</button>
          </form>
        </div>
      </div>
    {{-- <form class="" action="{{ url("usuario/detalles/{$user->id}") }}" method="post">
      {{ method_field('put') }}
      {{ csrf_field() }}

      <input type="text" name="username" placeholder="Usuario" value="{{ old('username', $user->username) }}">
      <input type="email" name="email" placeholder="Correo electrónico" value="{{ old('email', $user->email) }}">
      <input type="text" name="first_name" placeholder="Nombre" value="{{ old('first_name', $user->first_name) }}">
      <input type="text" name="last_name" placeholder="Apellido" value="{{ old('last_name', $user->last_name) }}">
      <input type="text" name="description" placeholder="Descripción personal" value="{{ old('description', $user->description) }}">
      <input type="password" name="password" placeholder="Contraseña">

      <button type="submit" name="button">Actualizar usuario</button>

    </form> --}}
  @endsection
