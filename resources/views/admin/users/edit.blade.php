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

      @include('admin.common.errors')

      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Usuario #{{ $user->id }}</div>
        <div class="card-body">
          <form id="form" action="{{ url("admin/usuarios/detalles/{$user->id}") }}" method="post" enctype="multipart/form-data">
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
              @if($user->id == 1)
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-6">
                      <div class="form-label-group">
                        <select class="form-control" name="is_active">
                          <option value="1" {{ 1 == $user->is_active ? 'selected=selected' : '' }}>Activo</option>
                          <option value="0" {{ 0 == $user->is_active ? 'selected=selected' : '' }}>Inactivo</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-label-group">
                        <select class="form-control" name="role_id">
                          @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ $role->id == $user->role->id ? 'selected=selected' : '' }}>{{ $role->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              @endif
            @if($user->id == Auth::user()->id)
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
                    <input name="password_confirmation" type="password" id="confirmPassword" class="form-control" placeholder="Confirmar contraseña">
                    <label for="confirmPassword">Confirmar contraseña</label>
                  </div>
                </div>
              </div>
            </div>
            @endif
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

  @section('script')
    <script>
      var formChanged = false;

      $("#form :input").change(function() {
          formChanged = true;
      });

      $(window).on("beforeunload", function() {
        if(formChanged == true){
          return "Es posible que los cambios no se guarden.";
        }
      });
      $(document).ready(function() {
        $("#form").on("submit", function(e) {
          $(window).off("beforeunload");
          return true;
        });
      });
    </script>
  @endsection
