  @extends('admin.layout')

  @section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/admin">Inicio</a>
      </li>
      <li class="breadcrumb-item">
        <a href="/admin/tags">Tags</a>
      </li>
      <li class="breadcrumb-item active">Detalles</li>
    </ol>

    @include('admin.common.success')

    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Tag #{{ $tag->id }}</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <th>Nombre:</th>
                  <td>{{ $tag->name }}</td>
                </tr>
                <tr>
                  <th>Usado en:</th>
                  <td>{{ $tag->posts()->count() }} posts</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  @endsection
