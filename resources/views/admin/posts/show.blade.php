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
                  <th>URL:</th>
                  <td><a href="{{ route('noticia', [str_slug($post->category->name), $post->slug, $post->id]) }}">{{ route('noticia', [str_slug($post->category->name), $post->slug, $post->id]) }}</a></td>
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
                  <th>Encabezado:</th>
                  <td>{{ $post->header }}</td>
                </tr>
                <tr>
                  <th>Texto:</th>
                  <td>{!! $post->body !!}</td>
                </tr>
                <tr>
                  <th>Tags:</th>
                  <td>
                    @foreach ($post->tags as $tag)
                      <span>{{ $tag->name }}</span>
                    @endforeach
                  </td>
                </tr>
                <tr>
                  <th>Fecha de creación:</th>
                  <td>{{ $post->created_at->format('d-m-Y H:i') }}</td>
                </tr>
                <tr>
                  <th>Ultima modificación:</th>
                  <td>{{ $post->updated_at->format('d-m-Y H:i') }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  @endsection
