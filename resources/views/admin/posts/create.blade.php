    @extends('admin.layout')

    @section('content')
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Inicio</a>
        </li>
        <li class="breadcrumb-item">
          <a href="/admin/posts">Posts</a>
        </li>
        <li class="breadcrumb-item active">Crear</li>
      </ol>

      @include('admin.common.errors')

    <div class="card card-register mx-auto mt-5">
      <div class="card-body">
        <form class="" action="{{ url('admin/posts/crear') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <div class="form-group">
              <div class="form-label-group">
                <input name="title" type="text" id="inputTitle" class="form-control" placeholder="Título" value="{{ old('title') }}" required="required">
                <label for="inputTitle">Título</label>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <select class="form-control" name="category_id">
                    <option value="0">Seleccione una categoría...</option>
                    @foreach ($categorias as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected=selected' : '' }}> {{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <input name="user_id" type="text" class="d-none" value="{{ Auth::user()->id }}" required="required">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input name="background" type="file" id="inputBackground" value="{{ old('background') }}"></input>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <textarea name="body" id="inputBody" class="form-control" placeholder="Escriba su contenido..." rows="10" required="required">{{ old('body') }}</textarea>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit">Crear post</button>
        </form>
      </div>
    </div>
  @endsection
