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

      <div class="card card-register mx-auto mt-5 mb-5">
        <div class="card-header">
          Editar usuario
        </div>
        <div class="card-body">
          <form id="form" action="{{ url("admin/usuarios/detalles/{$user->id}") }}" method="post" enctype="multipart/form-data">
            {{ method_field('put') }}
            {{ csrf_field() }}
            <div class="form-group">
              <div class="form-group">
                <div class="form-label-group">
                  <div class="form-row">
                    <div class="col-md-10">
                      <label for="inputUsername">Usuario</label>
                    </div>
                    <div class="col-md-2">
                      <span id="rc-1" class="remaining-char float-right"></span>
                    </div>
                  </div>
                  <input name="username" type="text" id="inputUsername" class="form-control" value="{{ old('username', $user->username)}}" placeholder="Escribe un nombre de usuario..." required="required" maxlength="191">
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group pr-2">
                    <div class="form-row">
                      <div class="col-md-10">
                        <label for="firstNamename">Nombre</label>
                      </div>
                      <div class="col-md-2">
                        <span id="rc-2" class="remaining-char float-right"></span>
                      </div>
                    </div>
                    <input name="first_name" type="text" id="firstName" class="form-control" value="{{ old('first_name', $user->first_name)}}" placeholder="Escribe un nombre..." required="required" maxlength="191">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group pl-2">
                    <div class="form-row">
                      <div class="col-md-10">
                        <label for="lastName">Apellido</label>
                      </div>
                      <div class="col-md-2">
                        <span id="rc-3" class="remaining-char float-right"></span>
                      </div>
                    </div>
                    <input name="last_name" type="text" id="lastName" class="form-control" value="{{ old('last_name', $user->last_name)}}" placeholder="Escribe un apellido..." required="required" maxlength="191">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <div class="form-row">
                  <div class="col-md-10">
                    <label for="inputEmail">Correo electrónico</label>
                  </div>
                  <div class="col-md-2">
                    <span id="rc-4" class="remaining-char float-right"></span>
                  </div>
                </div>
                <input name="email" type="email" id="inputEmail" class="form-control" value="{{ old('email', $user->email)}}" placeholder="Escribe un email de contacto..." required="required" maxlength="191">
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <div class="form-row">
                  <div class="col-md-10">
                    <label for="inputDescription">Descripción</label>
                  </div>
                  <div class="col-md-2">
                    <span id="rc-5" class="remaining-char float-right"></span>
                  </div>
                </div>
                <textarea name="description" id="inputDescription" class="form-control" placeholder="Escribe una descripción personal..." maxlength="200">{{ old('description', $user->description)}}</textarea>
              </div>
            </div>
              @if(Auth::user()->hasRole('Director ejecutivo') && $user->role->name != 'Director ejecutivo')
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-6">
                      <div class="form-label-group pr-2">
                        <label for="is_active">Estado</label>
                        <select class="form-control" name="is_active">
                          <option value="1" {{ 1 == $user->is_active ? 'selected=selected' : '' }}>Activo</option>
                          <option value="0" {{ 0 == $user->is_active ? 'selected=selected' : '' }}>Inactivo</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-label-group pl-2">
                        <label for="role_id">Rol</label>
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
                <div class="col-md-6 pr-2">
                  <div class="form-label-group">
                    <div class="form-row">
                      <div class="col-md-10">
                        <label for="inputPassword">Contraseña</label>
                      </div>
                      <div class="col-md-2">
                        <span id="rc-6" class="remaining-char float-right"></span>
                      </div>
                    </div>
                    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Escribe una contraseña..." minlength="6" maxlength="191">
                  </div>
                </div>
                <div class="col-md-6 pl-2">
                  <div class="form-label-group">
                    <label for="confirmPassword">Confirmar contraseña</label>
                    <input name="password_confirmation" type="password" id="confirmPassword" class="form-control" placeholder="Confirma la contraseña..." maxlength="191">
                  </div>
                </div>
              </div>
            </div>
            @endif
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label for="inputAvatar">Avatar</label>
                    <input name="avatar" type="file" id="inputAvatar" placeholder="Avatar" value="{{ old('avatar') }}"></input>
                  </div>
                </div>
                @if($user->avatar != null)
                <div class="col-md-6 form-checkbox">
                  <div class="form-label-group">
                    <input class="form-check-input" name="deleteAvatar" type="checkbox" id="inputDeleteAvatar"></input>
                    <label class="form-check-label" for="deleteAvatar">
                      Eliminar avatar actual
                    </label>
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
    <script type="text/javascript">
    var maxLengthRC1 = 191;
    var maxLengthRC2 = 191;
    var maxLengthRC3 = 191;
    var maxLengthRC4 = 191;
    var maxLengthRC5 = 200;
    var maxLengthRC6 = 191;

    $('#inputUsername').on('keyup keydown', function() {
      var length = $(this).val().length;
      var length = maxLengthRC1-length;
      $('#rc-1').text(length);
      if(length < 50){
        $('#rc-1').show();
      } else {
        $('#rc-1').hide();
      }
    });

    $('#firstName').on('keyup keydown', function() {
      var length = $(this).val().length;
      var length = maxLengthRC2-length;
      $('#rc-2').text(length);
      if(length < 50){
        $('#rc-2').show();
      } else {
        $('#rc-2').hide();
      }
    });

    $('#lastName').on('keyup keydown', function() {
      var length = $(this).val().length;
      var length = maxLengthRC3-length;
      $('#rc-3').text(length);
      if(length < 50){
        $('#rc-3').show();
      } else {
        $('#rc-3').hide();
      }
    });

    $('#inputEmail').on('keyup keydown', function() {
      var length = $(this).val().length;
      var length = maxLengthRC4-length;
      $('#rc-4').text(length);
      if(length < 50){
        $('#rc-4').show();
      } else {
        $('#rc-4').hide();
      }
    });

    $('#inputDescription').on('keyup keydown', function() {
      var length = $(this).val().length;
      var length = maxLengthRC5-length;
      $('#rc-5').text(length);
      if(length < 50){
        $('#rc-5').show();
      } else {
        $('#rc-5').hide();
      }
    });

    $('#inputPassword').on('keyup keydown', function() {
      var length = $(this).val().length;
      var length = maxLengthRC6-length;
      $('#rc-6').text(length);
      if(length < 50){
        $('#rc-6').show();
      } else {
        $('#rc-6').hide();
      }
    });
    </script>

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
