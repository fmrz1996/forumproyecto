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
                  <th>Usuario</th>
                  <th>Nombre</th>
                  <th>Correo electrónico</th>
                  @if(Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Desarrollador'))
                  <th>Estado</th>
                  <th class="text-center">Acciones</th>
                  @endif
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Usuario</th>
                  <th>Nombre</th>
                  <th>Correo electrónico</th>
                  @if(Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Desarrollador'))
                  <th>Estado</th>
                  <th class="text-center">Acciones</th>
                  @endif
                </tr>
              </tfoot>
              <tbody>
                @forelse( $usuarios as $user)
                  <tr>
                    @if(Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Desarrollador'))
                    <td><a href="{{ route('usuarios.mostrar', ['id' => $user->id]) }}">{{ $user->username }}</a></td>
                    @else
                      <td>{{ $user->username }}</td>
                    @endif
                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    @if(Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Desarrollador'))
                        @if($user->is_active == 1)
                          <td>Activo</td>
                        @else
                          <td>Inactivo</td>
                        @endif
                    <td class="text-center">
                        <a class="btn btn-link" href="{{ route('usuarios.editar', ['id' => $user->id]) }}" title="Editar">
                          <i class="far fa-edit"></i>
                        </a>
                        <a class="btn btn-link" href="{{ route('usuarios.mostrar', ['id' => $user->id]) }}" title="Ver detalles">
                          <i class="fas fa-info-circle"></i>
                        </a>
                    </td>
                    @endif
                  </tr>
                @empty
                  <tr>No hay usuarios registrados.</tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    @endsection

    @section('script')
      <script src="../../../js/adminpanel/datatables/jquery.dataTables.js"></script>
      <script src="../../../js/adminpanel/datatables/dataTables.bootstrap4.js"></script>

      <script type="text/javascript">
        $(document).ready(function() {
          $('#dataTable').DataTable({
            language: {url: '../../../js/adminpanel/datatables/Spanish.json'},
            @if(Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Desarrollador'))
            "columnDefs": [
              { "orderable": false, "targets": 4}
            ]
            @endif
          });
        });
      </script>
    @endsection
