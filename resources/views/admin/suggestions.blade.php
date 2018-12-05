@extends('admin.layout')

@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="/admin">Inicio</a>
    </li>
    <li class="breadcrumb-item active">Sugerencias</li>
  </ol>
  <div class="card mb-3">
    <div class="card-header">
      <h4><a href="{{ route('admin.sugerencias') }}"><i class="fas fa-exclamation-circle"></i>  Sugerencias</a></h4>
    </div>
    <div class="card-body">
      @if(!$suggestions[0]->isEmpty() || !$suggestions[1]->isEmpty() || !$suggestions[2]->isEmpty() || !$suggestions[3]->isEmpty())
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>Agregar encabezado a los siguientes posts:</h6>
          <ul class="list-unstyled list-padding">
            @forelse($suggestions[0]->slice(0, 10) as $post)
              <li><a href="{{ route('posts.editar', ['id' => $post->id]) }}"><i class="far fa-edit"></i></a>  {{ str_limit($post->title, 60, '...') }}</li>
            @empty
              <li style="list-style-type: disc">¡Todo en orden!, revise las otras sugerencias.</li>
            @endforelse
            @if($suggestions[0]->count() > 10)
              <br>
              <p class="text-muted"><i class="fas fa-exclamation-triangle"></i>  Posts en total: {{ $suggestions[0]->count() }}</p>
            @endif
          </ul>
        </div>
        <div class="col-sm-12 col-md-6">
          <h6>Agregar tags a los siguientes posts:</h6>
          <ul class="list-unstyled list-padding">
            @forelse ($suggestions[1]->slice(0, 10) as $post)
              <li><a href="{{ route('posts.editar', ['id' => $post->id]) }}"><i class="far fa-edit"></i></a>  {{ str_limit($post->title, 60, '...') }}</li>
            @empty
              <li style="list-style-type: disc">¡Todo en orden!, revise las otras sugerencias.</li>
            @endforelse
            @if($suggestions[1]->count() > 10)
              <br>
              <p class="text-muted"><i class="fas fa-exclamation-triangle"></i>  Posts en total: {{ $suggestions[0]->count() }}</p>
            @endif
          </ul>
        </div>
      </div>
      <hr>
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>Agregar descripción a los siguientes usuarios:</h6>
            <ul class="list-unstyled list-padding">
              @forelse ($suggestions[2]->slice(0, 10) as $user)
                <li><a href="{{ route('usuarios.editar', ['id' => $user->id]) }}"><i class="far fa-edit"></i></a>  {{ $user->first_name }} {{ $user->last_name }}</li>
              @empty
                <li style="list-style-type: disc">¡Todo en orden!, revise las otras sugerencias.</li>
              @endforelse
              @if($suggestions[2]->count() > 10)
                <br>
                <p class="text-muted"><i class="fas fa-exclamation-triangle"></i>  Usuarios en total: {{ $suggestions[0]->count() }}</p>
              @endif
            </ul>
          </div>
          <div class="col-sm-12 col-md-6">
            <h6>Agregar avatar a los siguientes usuarios:</h6>
            <ul class="list-unstyled list-padding">
              @forelse ($suggestions[3]->slice(0, 10) as $user)
                <li><a href="{{ route('usuarios.editar', ['id' => $user->id]) }}"><i class="far fa-edit"></i></a>  {{ $user->first_name }} {{ $user->last_name }}</li>
              @empty
                <li style="list-style-type: disc">¡Todo en orden!, revise las otras sugerencias.</li>
              @endforelse
              @if($suggestions[3]->count() > 10)
                <br>
                <p class="text-muted"><i class="fas fa-exclamation-triangle"></i>  Usuarios en total: {{ $suggestions[0]->count() }}</p>
              @endif
            </ul>
          </div>
        </div>
      @else
        <h6>¡Todo en orden!</h6>
      @endif
      </div>
    </div>
  </div>
@endsection
