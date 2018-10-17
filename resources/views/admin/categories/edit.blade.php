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
        <div class="card-header">Categoría #{{ $category->id }}</div>
        <div class="card-body">
          <form class="" action="{{ url("admin/categorias/detalles/{$category->id}") }}" method="post">
            {{ method_field('put') }}
            {{ csrf_field() }}
            <div class="form-group">
              <div class="form-label-group">
                <input name="name" type="text" id="inputName" class="form-control" value="{{ old('name', $category->name)}}" placeholder="Nombre" required="required">
                <label for="inputName">Nombre</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <select class="form-control" name="is_active">
                  <option value="1">Activo</option>
                  <option value="0">Inactivo</option>
                </select>
              </div>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Actualizar</button>
          </form>
            </div>
        </div>
  @endsection
