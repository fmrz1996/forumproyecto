    @extends('admin.layout')

    @section('content')
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Inicio</a>
        </li>
        <li class="breadcrumb-item">
          <a href="/admin/categorias">Categorías</a>
        </li>
        <li class="breadcrumb-item active">Editar</li>
      </ol>

      @include('admin.common.errors')

      <div class="card card-register mx-auto mt-5">
        <div class="card-header">
          Editar categoría
        </div>
        <div class="card-body">
          <form class="" action="{{ url("admin/categorias/detalles/{$category->id}") }}" method="post">
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
                <input name="name" type="text" id="inputName" class="form-control" value="{{ old('name', $category->name)}}" placeholder="Escribe un nombre..." required="required" maxlength="50">
              </div>
            </div>
              @if(Auth::user()->hasRole('Director ejecutivo'))
                <div class="form-group">
                  <div class="form-label-group">
                    <label for="is_active">Estado</label>
                    <select class="form-control" name="is_active">
                      <option value="1">Activo</option>
                      <option value="0">Inactivo</option>
                    </select>
                  </div>
                </div>
              @endif
            <button class="btn btn-primary btn-block" type="submit">Actualizar</button>
          </form>
            </div>
        </div>
  @endsection

  @section('script')
    <script type="text/javascript">
    var maxLengthRC1 = 50;

    $('#inputName').on('keyup keydown', function() {
      var length = $(this).val().length;
      var length = maxLengthRC1-length;
      $('#rc-1').text(length);
      if(length < 20){
        $('#rc-1').show();
      } else {
        $('#rc-1').hide();
      }
    });
    </script>
  @endsection
