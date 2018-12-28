  @extends('admin.layout')

  @section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/admin">Inicio</a>
      </li>
      <li class="breadcrumb-item">
        <a href="/admin/columnas">Columnas</a>
      </li>
      <li class="breadcrumb-item active">Detalles</li>
    </ol>

    @include('admin.common.success')

    <div class="card card-register mx-auto mt-5">
      <div class="card-header">
        Columna #{{ $column->id }}
        <a class="float-right" href="{{ route('columnas.editar', $column->id) }}">
          <i class="far fa-edit"></i> Editar
        </a>
      </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <th>Título:</th>
                  <td>{{ $column->title }}</td>
                </tr>
                <tr>
                  <th>URL:</th>
                  <td><a href="{{ route('columna', [$column->slug, $column->id]) }}">{{ route('columna', [$column->slug, $column->id]) }}</a></td>
                </tr>
                <tr>
                  <th>Columnista:</th>
                  <td>{{ $column->columnist->name }} @if($column->columnist->occupation != null) ({{ $column->columnist->occupation }})@endif</td>
                </tr>
                <tr>
                  <th>Texto:</th>
                  <td>{!! $column->body !!}</td>
                </tr>
                <tr>
                  <th>Autor:</th>
                  <td>{{ $column->user->first_name }} {{ $column->user->last_name }}</td>
                </tr>
                <tr>
                  <th>Fecha de creación:</th>
                  <td>{{ $column->created_at->format('d-m-Y H:i') }}</td>
                </tr>
                <tr>
                  <th>Ultima modificación:</th>
                  <td>{{ $column->updated_at->format('d-m-Y H:i') }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  @endsection
