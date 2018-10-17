    @extends('admin.layout')

    @section('content')
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Inicio</a>
        </li>
        <li class="breadcrumb-item">
          <a href="/admin/usuarios">Usuarios</a>
        </li>
        <li class="breadcrumb-item active">Crear</li>
      </ol>

      @include('admin.common.errors')

    <div class="card card-register mx-auto mt-5">
      <div class="card-body">
        <form class="" action="{{ url('admin/usuarios/crear') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <div class="form-group">
              <div class="form-label-group">
                <input name="username" type="text" id="inputUsername" class="form-control" placeholder="Usuario" value="{{ old('username') }}" required="required">
                <label for="inputUsername">Usuario</label>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input name="first_name" type="text" id="firstName" class="form-control" placeholder="Nombre" value="{{ old('first_name') }}" required="required">
                  <label for="firstName">Nombre</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input name="last_name" type="text" id="lastName" class="form-control" placeholder="Apellido" value="{{ old('last_name') }}" required="required">
                  <label for="lastName">Apellido</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Correo electrónico" value="{{ old('email') }}" required="required">
              <label for="inputEmail">Correo electrónico</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <textarea name="description" id="inputDescription" class="form-control" placeholder="Descripción" value="{{ old('description') }}"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required="required">
                  {{-- @if ($errors->has('password')) autofocus @endif> --}}
                  <label for="inputPassword">Contraseña</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input name="password_confirmation" type="password" id="confirmPassword" class="form-control" placeholder="Confirmar contraseña" required="required">
                  <label for="confirmPassword">Confirmar contraseña</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input name="avatar" type="file" id="inputAvatar" placeholder="Avatar" value="{{ old('avatar') }}"></input>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit">Crear usuario</button>
        </form>
      </div>
    </div>

    {{-- <form class="" action="{{ url('usuario/crear') }}" method="post">
      {{ csrf_field() }}

      <input type="text" name="username" placeholder="Usuario" value="{{ old('username') }}">
      <input type="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}">
      <input type="text" name="first_name" placeholder="Nombre" value="{{ old('first_name') }}">
      <input type="text" name="last_name" placeholder="Apellido" value="{{ old('last_name') }}">
      <input type="text" name="description" placeholder="Descripción personal" value="{{ old('description') }}">
      <input type="password" name="password" placeholder="Contraseña">

      <button type="submit" name="button">Crear usuario</button>

    </form> --}}

  @endsection
