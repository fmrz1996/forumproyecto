  @extends('admin.layout')

  @section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/admin">Inicio</a>
      </li>
      <li class="breadcrumb-item">
        <a href="/admin/usuarios">Usuarios</a>
      </li>
      <li class="breadcrumb-item active">Detalles</li>
    </ol>

    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Usuario #{{ $user->id }}</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <th>Usuario:</th>
                  <td>{{ $user->username }}</td>
                </tr>
                <tr>
                  <th>Nombre:</th>
                  <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                </tr>
                <tr>
                  <th>Correo electrónico:</th>
                  <td>{{ $user->email }}</td>
                </tr>
                <tr>
                  <th>Descripción:</th>
                  <td>{{ $user->description }}</td>
                </tr>
                <tr>
                  <th>Fecha de creación:</th>
                  <td>{{ $user->created_at}}</td>
                </tr>
                <tr>
                  <th>Avatar:</th>
                  @if($user->avatar != null)
                  <td align="center"><img class="show-img" src="../../../img/{{ $user->avatar }}"></td>
                  @else
                  <td>No registrado</td>
                  @endif
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  @endsection
