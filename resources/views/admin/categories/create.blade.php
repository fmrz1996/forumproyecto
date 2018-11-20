    @extends('admin.layout')

    @section('content')
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Inicio</a>
        </li>
        <li class="breadcrumb-item">
          <a href="/admin/categorias">Categorías</a>
        </li>
        <li class="breadcrumb-item active">Crear</li>
      </ol>

      @include('admin.common.errors')

      <div class="card card-register mx-auto mt-5">
        <div class="card-header">
          Crear categoría
        </div>
        <div class="card-body">
          <form action="{{ url('admin/categorias/crear') }}" method="post">
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
                  <input name="name" type="text" id="inputName" class="form-control" placeholder="Escribe un nombre..." value="{{ old('name') }}" required="required" maxlength="50">
                </div>
              </div>
            <button class="btn btn-primary btn-block" type="submit">Crear categoría</button>
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
