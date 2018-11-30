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
      <div class="card-header">
        Post #{{ $post->id }}
        <a class="float-right" href="{{ route('posts.editar', $post->id) }}">
          <i class="far fa-edit"></i> Editar
        </a>
      </div>
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
                    <span class="font-italic">No registrado</span>
                  @endif
                </tr>
                <tr>
                  <th>Encabezado:</th>
                    @if($post->header != null)
                      <td>
                        {{ $post->header }}
                      </td>
                    @else
                      <td class="font-italic">
                        <span class="font-italic">No registrado</span>
                      </td>
                    @endif
                </tr>
                <tr>
                  <th>Texto:</th>
                  <td>{!! $post->body !!}</td>
                </tr>
                <tr>
                  <th>Estilo:</th>
                  <td>
                    @if($post->style === 1)Clásico
                    @elseif($post->style === 2)Panorámico
                    @endif
                  </td>
                </tr>
                <tr>
                  <th>Tags:</th>
                  <td class="article-tags">
                    @forelse ($post->tags as $tag)
                      <a href="{{ route('tags.mostrar', $tag->id) }}">{{ $tag->name }}</a>
                    @empty
                      <span class="font-italic">No registrado</span>
                    @endforelse
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
