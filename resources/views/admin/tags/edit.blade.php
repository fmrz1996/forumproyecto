    @extends('admin.layout')

    @section('content')
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Inicio</a>
        </li>
        <li class="breadcrumb-item">
          <a href="/admin/tags">Tags</a>
        </li>
        <li class="breadcrumb-item active">Editar</li>
      </ol>

      @include('admin.common.errors')

      <div class="card card-register mx-auto mt-5">
        <div class="card-header">
          Editar tag
        </div>
        <div class="card-body">
          <form class="" action="{{ url("admin/tags/detalles/{$tag->id}") }}" method="post">
            {{ method_field('put') }}
            {{ csrf_field() }}
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
                <input name="name" type="text" id="inputName" class="form-control" value="{{ old('name', $tag->name)}}" placeholder="Escribe un nombre..." required="required" maxlength="30">
              </div>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Actualizar</button>
          </form>
            </div>
        </div>
  @endsection

  @section('script')
    <script type="text/javascript">
    var maxLengthRC1 = 30;

    $('#inputName').on('keyup keydown', function() {
      var length = $(this).val().length;
      var length = maxLengthRC1-length;
      $('#rc-1').text(length);
      if(length < 15){
        $('#rc-1').show();
      } else {
        $('#rc-1').hide();
      }
    });
    </script>
  @endsection
