    @extends('admin.layout')

    @section('content')
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Columnas</li>
      </ol>

      @include('admin.common.success')

      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
          Columnas Registradas
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered nowrap" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Título</th>
                  <th>Columnista</th>
                  <th>Autor</th>
                  <th>Ultima modificación</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Título</th>
                  <th>Columnista</th>
                  <th>Autor</th>
                  <th>Ultima modificación</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </tfoot>
              <tbody>
                @forelse( $columns as $column)
                  <tr>
                    <td>{{ $column->id }}</td>
                    <td>{{ str_limit($column->title, 80, '...') }}</td>
                    <td>{{ $column->columnist->name }}</td>
                    <td>{{ $column->user->first_name }} {{ $column->user->last_name }}</td>
                    <td><span>{{ $column->updated_at }}</span>{{ $column->updated_at->format('d-m-Y H:i') }}</td>
                    <td class="text-center">
                      <form id="delete" action="{{ route('columnas.eliminar', $column->id ) }}" method="post">
                        @csrf
                        @if($column->user->id == auth()->user()->id || (Auth::user()->hasRole('Director ejecutivo')))
                          <a class="btn btn-link" href="{{ route('columnas.editar', ['id' => $column->id]) }}" title="Editar">
                            <i class="far fa-edit"></i>
                          </a>
                        @elseif($column->user->role->name == ('Periodista') && (Auth::user()->hasAnyRole(['Director ejecutivo', 'Administrador'])))
                          <a class="btn btn-link" href="{{ route('columnas.editar', ['id' => $column->id]) }}" title="Editar">
                            <i class="far fa-edit"></i>
                          </a>
                        @endif
                        @if($column->user->id == auth()->user()->id || (Auth::user()->hasRole('Director ejecutivo')))
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                          <a class="btn btn-link" href="#" data-toggle="modal" data-target="#deleteModal">
                            <i class="far fa-trash-alt"></i>
                          </a>
                        @endif
                        <a class="btn btn-link" href="{{ route('columnas.mostrar', ['id' => $column->id]) }}" title="Ver detalles">
                          <i class="fas fa-info-circle"></i>
                        </a>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr>No hay columnas registradas.</tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Delete Modal-->
      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">¿Realmente deseas eliminar esta columna?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Esta acción no se puede deshacer o recuperar en un futuro.</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
              <a class="btn btn-danger" href="{{ route('posts') }}" onclick="event.preventDefault();document.getElementById('delete').submit();">Eliminar columna</a>
            </div>
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
                "targets": 5,
              }
            ],
            "order": [[4, "desc"]]
          });
        });
      </script>
    @endsection
