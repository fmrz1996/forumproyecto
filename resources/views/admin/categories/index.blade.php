    @extends('admin.layout')

    @section('content')
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Categorías</li>
      </ol>

      @include('admin.common.success')

      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
          Categorías registradas
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Estado</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Estado</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </tfoot>
              <tbody>
                @forelse( $categorias as $category)
                  <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                  @if($category->is_active == 1)
                    <td>Activo</td>
                  @else
                    <td>Inactivo</td>
                  @endif
                    <td class="text-center">
                      @if(Auth::user()->hasAnyRole(['Director ejecutivo', 'Administrador']))
                        <a class="btn btn-link" href="{{ route('categorias.editar', ['id' => $category->id]) }}" title="Editar">
                          <i class="far fa-edit"></i>
                        </a>
                      @endif
                        <a class="btn btn-link" href="{{ route('categorias.mostrar', ['id' => $category->id]) }}" title="Ver detalles">
                          <i class="fas fa-info-circle"></i>
                        </a>
                    </td>
                  </tr>
                @empty
                  <tr>No hay categorías registradas.</tr>
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
            @if(Auth::user()->hasRole('Administrador'))
            "columnDefs": [
              { "orderable": false, "targets": 2}
            ]
            @endif
          });
        });
      </script>
    @endsection
