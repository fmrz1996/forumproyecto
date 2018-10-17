  @extends('admin.layout')

  @section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/admin">Inicio</a>
      </li>
      <li class="breadcrumb-item">
        <a href="/admin/posts">Posts</a>
      </li>
      <li class="breadcrumb-item active">Detalles</li>
    </ol>

    @include('admin.common.success')

    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Post #{{ $post->id }}</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <th>Título:</th>
                  <td>{{ $post->title }}</td>
                </tr>
                <tr>
                  <th>Categoría:</th>
                  <td>{{ $post->category->name }}</td>
                </tr>
                <tr>
                  <th>Autor:</th>
                  <td>{{ $post->user->first_name }} {{ $post->user->last_name }} ({{ $post->user->username}})</td>
                </tr>
                <tr>
                  <th>Imágen principal:</th>
                  @if($post->background != null)
                  <td><img class="show-img text-center" src="../../../img/{{ $post->background }}"></td>
                  @else
                  <td>No registrado</td>
                  @endif
                </tr>
                <tr>
                  <th>Texto:</th>
                  <td>{{ $post->body }}</td>
                </tr>
                <tr>
                  <th>Fecha de creación:</th>
                  <td>{{ $post->created_at }}</td>
                </tr>
                <tr>
                  <th>Ultima modificación:</th>
                  <td>{{ $post->updated_at }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  @endsection
