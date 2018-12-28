    @extends('admin.layout')

    @section('content')
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Columnistas</li>
      </ol>

      @include('admin.common.success')

      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
          Columnistas Registrados
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered nowrap" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Columnista</th>
                  <th>Ocupación</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Columnista</th>
                  <th>Ocupación</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </tfoot>
              <tbody>
                @forelse($columnists as $columnist)
                  <tr>
                    <td>{{ $columnist->id }}</td>
                    <td>{{ $columnist->name }}</td>
                    @if($columnist->occupation != null)
                    <td>{{ $columnist->occupation }}</td>
                    @else
                    <td>No registrado</td>
                    @endif
                    <td class="text-center">
                      @if(Auth::user()->hasAnyRole(['Director ejecutivo', 'Administrador']))
                      <a class="btn btn-link" href="{{ route('columnistas.editar', ['id' => $columnist->id]) }}" title="Editar">
                        <i class="far fa-edit"></i>
                      </a>
                      @endif
                      <a class="btn btn-link" href="{{ route('columnistas.mostrar', ['id' => $columnist->id]) }}" title="Ver detalles">
                        <i class="fas fa-info-circle"></i>
                      </a>
                    </td>
                  </tr>
                @empty
                  <tr>No hay columnistas registrados.</tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
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
              {
                "orderable": false,
                "targets": 3,
              }
            ],
            "order": [[0, "desc"]]
          });
        });
      </script>
    @endsection
