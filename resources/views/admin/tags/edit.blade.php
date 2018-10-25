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
        <div class="card-header">Tag #{{ $tag->id }}</div>
        <div class="card-body">
          <form class="" action="{{ url("admin/tags/detalles/{$tag->id}") }}" method="post">
            {{ method_field('put') }}
            {{ csrf_field() }}
            <div class="form-group">
              <div class="form-label-group">
                <input name="name" type="text" id="inputName" class="form-control" value="{{ old('name', $tag->name)}}" placeholder="Nombre" required="required" maxlength="30">
                <label for="inputName">Nombre</label>
              </div>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Actualizar</button>
          </form>
            </div>
        </div>
  @endsection
