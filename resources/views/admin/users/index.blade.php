    @extends('admin.layout')

    @section('content')
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Usuarios</li>
      </ol>

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
                  <th>Fecha de Registro</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Usuario</th>
                  <th>Nombre</th>
                  <th>Correo electrónico</th>
                  <th>Fecha de Registro</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </tfoot>
              <tbody>
                @forelse( $usuarios as $user)
                  <tr>
                    <td><a href="{{ route('usuarios.mostrar', ['id' => $user->id]) }}">{{ $user->username }}</a></td>
                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td class="text-center">
                      <form action="{{ route('usuarios.eliminar', $user->id ) }}" method="post">
                        <a class="btn btn-link" href="{{ route('usuarios.editar', ['id' => $user->id]) }}" title="Editar">
                          <i class="far fa-edit"></i>
                        </a>
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button class="btn btn-link" type="submit" name="button" title="Eliminar">
                          <i class="far fa-trash-alt"></i>
                        </button>
                        <a class="btn btn-link" href="{{ route('usuarios.mostrar', ['id' => $user->id]) }}" title="Ver detalles">
                          <i class="fas fa-info-circle"></i>
                        </a>
                      </form>
                    </td>
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
            "columnDefs": [
              { "orderable": false, "targets": 4}
            ]
          });
        });
      </script>
    @endsection
