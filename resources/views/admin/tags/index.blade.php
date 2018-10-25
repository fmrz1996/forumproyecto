    @extends('admin.layout')

    @section('content')
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Tags</li>
      </ol>

      @include('admin.common.success')

      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
          Tags registrados
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </tfoot>
              <tbody>
                @forelse( $tags as $tag)
                  <tr>
                    <td>{{ $tag->id }}</td>
                    <td>
                      <a href="{{ route('tags.mostrar', ['id' => $tag->id]) }}">
                        {{ $tag->name }}
                      </a>
                    </td>
                    <td class="text-center">
                      <form class="delete" action="{{ route('tags.eliminar', $tag->id ) }}" method="post">
                        @if(Auth::user()->hasRole('Administrador'))
                          <a class="btn btn-link" href="{{ route('tags.editar', ['id' => $tag->id]) }}" title="Editar">
                            <i class="far fa-edit"></i>
                          </a>
                          {{ csrf_field() }}
                          {{ method_field('delete') }}
                          <button class="btn btn-link" type="submit" name="button" title="Eliminar">
                            <i class="far fa-trash-alt"></i>
                          </button>
                        @endif
                        <a class="btn btn-link" href="{{ route('tags.mostrar', ['id' => $tag->id]) }}" title="Ver detalles">
                          <i class="fas fa-info-circle"></i>
                        </a>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr>No hay tags registrados.</tr>
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
              { "orderable": false, "targets": 2}
            ]
          });
        });
      </script>
      <script>
          $(".delete").on("submit", function(){
              return confirm("¿Realmente deseas eliminar el tag?");
          });
      </script>
    @endsection
