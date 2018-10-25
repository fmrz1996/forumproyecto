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
        <div class="card-body">
          <form class="" action="{{ url('admin/categorias/crear') }}" method="post">
            {{ csrf_field() }}
              <div class="form-group">
                <div class="form-label-group">
                  <input name="name" type="text" id="inputName" class="form-control" placeholder="Nombre" value="{{ old('name') }}" required="required">
                  <label for="inputName">Nombre</label>
                </div>
              </div>
            <button class="btn btn-primary btn-block" type="submit">Crear categoría</button>
          </form>
        </div>
      </div>
      @endsection
