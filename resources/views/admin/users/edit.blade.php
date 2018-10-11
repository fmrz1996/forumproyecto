    @extends('admin.layout')

    @section('content')
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Inicio</a>
        </li>
        <li class="breadcrumb-item">
          <a href="/admin/usuarios">Usuarios</a>
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
        <div class="card-header">Usuario #{{ $user->id }}</div>
        <div class="card-body">
          <form class="" action="{{ url("admin/usuarios/detalles/{$user->id}") }}" method="post" enctype="multipart/form-data">
            {{ method_field('put') }}
            {{ csrf_field() }}
            <div class="form-group">
              <div class="form-group">
                <div class="form-label-group">
                  <input name="username" type="text" id="inputUsername" class="form-control" value="{{ old('username', $user->username)}}" placeholder="Usuario" required="required">
                  <label for="inputUsername">Usuario</label>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input name="first_name" type="text" id="firstName" class="form-control" value="{{ old('first_name', $user->first_name)}}" placeholder="Nombre" required="required">
                    <label for="firstName">Nombre</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input name="last_name" type="text" id="lastName" class="form-control" value="{{ old('last_name', $user->last_name)}}" placeholder="Apellido" required="required">
                    <label for="lastName">Apellido</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input name="email" type="email" id="inputEmail" class="form-control" value="{{ old('email', $user->email)}}" placeholder="Correo electrónico" required="required">
                <label for="inputEmail">Correo electrónico</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <textarea name="description" id="inputDescription" class="form-control" placeholder="Descripción">{{ old('description', $user->description)}}</textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Contraseña">
                    <label for="inputPassword">Contraseña</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="confirmPassword" class="form-control" placeholder="Confirmar contraseña">
                    <label for="confirmPassword">Confirmar contraseña</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input name="avatar" type="file" id="inputAvatar" placeholder="Avatar" value="{{ old('avatar') }}"></input>
                  </div>
                </div>
                @if($user->avatar != null)
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label for="inputDeleteAvatar">Eliminar avatar actual</label>
                    <input name="deleteAvatar" type="checkbox" id="inputDeleteAvatar" placeholder="Avatar" value="{{ old('deleteAvatar') }}"></input>
                  </div>
                </div>
                @else
                <div class="col-md-6">
                </div>
                @endif
              </div>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Actualizar</button>
          </form>
        </div>
      </div>
  @endsection
