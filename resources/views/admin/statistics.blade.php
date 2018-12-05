@extends('admin.layout')

@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="/admin">Inicio</a>
    </li>
    <li class="breadcrumb-item active">Estadísticas</li>
  </ol>
  <div class="card mb-3">
    <div class="card-header">
      <h4><a href="#"><i class="fas fa-chart-line"></i>  Estadísticas (30 días)</a></h4>
    </div>
    <div class="card-body">
        <h6>Usuarios más activos:</h6>
        <table class="table nowrap mt-3" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th class="text-center">Posts</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($statistics[0] as $user)
            <tr>
              <td>{{ $loop->iteration }}.</td>
              <td><a href="{{ route('usuarios.mostrar', ['id' => $user->id]) }}">{{ $user->first_name }} {{ $user->last_name }}</a></td>
              <td class="text-center">{{ $user->posts_count }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="row">
         <div class="col-sm-12 col-md-6">
           <h6>Categorías más activas:</h6>
           <table class="table nowrap mt-3" width="100%" cellspacing="0">
             <thead>
               <tr>
                 <th>#</th>
                 <th>Nombre</th>
                 <th class="text-center">Posts</th>
               </tr>
             </thead>
             <tbody>
               @foreach ($statistics[1] as $category)
               <tr>
                 <td>{{ $loop->iteration }}.</td>
                 <td><a href="{{ route('categorias.mostrar', ['id' => $category->id]) }}">{{ $category->name }}</a></td>
                 <td class="text-center">{{ $category->posts_count }}</td>
               </tr>
               @endforeach
             </tbody>
           </table>
          </div>
          <div class="col-sm-12 col-md-6">
            <h6>Palabras claves más populares:</h6>
            <table class="table nowrap mt-3" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th class="text-center">Posts</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($statistics[2] as $tag)
                <tr>
                  <td>{{ $loop->iteration }}.</td>
                  <td><a href="{{ route('tags.mostrar', ['id' => $tag->id]) }}">{{ $tag->name }}</a></td>
                  <td class="text-center">{{ $tag->posts_count }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
