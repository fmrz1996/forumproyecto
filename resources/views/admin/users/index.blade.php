    @extends('admin.layout')

    @section('content')
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Usuarios</li>
      </ol>

      @include('admin.common.success')

      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
          Usuarios Registrados
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Usuario</th>
                  <th>Nombre</th>
                  <th>Correo electrónico</th>
                  <th>Rol</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Usuario</th>
                  <th>Nombre</th>
                  <th>Correo electrónico</th>
                  <th>Rol</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </tfoot>
              <tbody>
                @forelse( $usuarios as $user)
                  <tr>
                    <td> {{ $user->id }}</td>
                    <td><a href="{{ route('usuarios.mostrar', ['id' => $user->id]) }}">{{ $user->username }}</a></td>
                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td class="text-center">
                      @if($user->id == Auth::user()->id || (Auth::user()->hasRole('Director ejecutivo')))
                        <a class="btn btn-link" href="{{ route('usuarios.editar', ['id' => $user->id]) }}" title="Editar">
                          <i class="far fa-edit"></i>
                        </a>
                      @elseif ($user->role->name == 'Periodista' && (Auth::user()->hasAnyRole(['Director ejecutivo', 'Administrador'])))
                        <a class="btn btn-link" href="{{ route('usuarios.editar', ['id' => $user->id]) }}" title="Editar">
                          <i class="far fa-edit"></i>
                        </a>
                      @endif
                        <a class="btn btn-link" href="{{ route('usuarios.mostrar', ['id' => $user->id]) }}" title="Ver detalles">
                          <i class="fas fa-info-circle"></i>
                        </a>
                    </td>
                  </tr>
                @empty
                  <tr>No hay usuarios registrados.</tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Actualizado el {{ $last_update->format('d-m-Y') }} a las {{ $last_update->format('H:i') }}</div>
      </div>
    @endsection

    @section('script')
      <script src="../../../js/adminpanel/datatables/jquery.dataTables.js"></script>
      <script src="../../../js/adminpanel/datatables/dataTables.bootstrap4.js"></script>

      <script type="text/javascript">
        $(document).ready(function() {
          $('#dataTable').DataTable({
            language: {url: '../../../js/adminpanel/datatables/Spanish.json'},
            @if(Auth::user()->hasRole('Administrador'))
            "columnDefs": [
              { "orderable": false, "targets": 5}
            ]
            @endif
          });
        });
      </script>
    @endsection
