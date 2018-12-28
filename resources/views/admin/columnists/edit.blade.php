    @extends('admin.layout')

    @section('stylesheet')
    <link rel="stylesheet" href="../../../css/adminpanel/select2.min.css">
    @endsection

    @section('content')
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Inicio</a>
        </li>
        <li class="breadcrumb-item">
          <a href="/admin/columnistas">Columnistas</a>
        </li>
        <li class="breadcrumb-item active">Editar</li>
      </ol>

      @include('admin.common.errors')

    <div class="card card-register mx-auto mt-5 mb-5">
      <div class="card-header">
        Editar columnista
      </div>
      <div class="card-body">
        <form id="form" action="{{ url("admin/columnistas/detalles/{$columnist->id}") }}" method="post" enctype="multipart/form-data">
          {{ method_field('put') }}
          {{ csrf_field() }}
          <div class="form-group">
            <div class="form-group">
              <div class="form-label-group">
                <div class="form-row">
                  <div class="col-md-10">
                    <label for="inputName">Nombre</label>
                  </div>
                  <div class="col-md-2">
                    <span id="rc-1" class="remaining-char float-right"></span>
                  </div>
                </div>
                <input name="name" type="text" id="inputName" class="form-control" placeholder="Escribe un nombre..." value="{{ old('name', $columnist->name) }}" required="required" maxlength="150">
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <div class="form-row">
                  <div class="col-md-10">
                    <label for="inputOccupation">Ocupación</label>
                  </div>
                  <div class="col-md-2">
                    <span id="rc-1" class="remaining-char float-right"></span>
                  </div>
                </div>
                <input name="occupation" type="text" id="inputOccupation" class="form-control" placeholder="Escribe una ocupación..." value="{{ old('occupation', $columnist->occupation) }}" required="required" maxlength="150">
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label for="inputAvatar">Avatar</label>
                    <input name="avatar" type="file" id="inputAvatar" value="{{ old('avatar') }}" accept="image/x-png,image/gif,image/jpeg"></input>
                  </div>
                </div>
                @if($columnist->avatar != null)
                <div class="col-md-6 form-checkbox">
                  <div class="form-label-group">
                    <input name="deleteAvatar" type="checkbox" id="inputDeleteAvatar" placeholder="Avatar" value="{{ old('deleteAvatar') }}"></input>
                    <span>Eliminar avatar actual</span>
                  </div>
                </div>
                @else
                <div class="col-md-6">
                </div>
                @endif
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit">Crear columnista</button>
        </form>
      </div>
    </div>
  @endsection

  @section('script')
    <script type="text/javascript">
      var maxLengthRC1 = 150;

      $('#inputTitle').on('keyup keydown', function() {
        var length = $(this).val().length;
        var length = maxLengthRC1-length;
        $('#rc-1').text(length);
        if(length < 40){
          $('#rc-1').show();
        } else {
          $('#rc-1').hide();
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
