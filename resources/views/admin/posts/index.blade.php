    @extends('admin.layout')

    @section('content')
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Posts</li>
      </ol>

      @include('admin.common.success')

      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
          Posts Registrados
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered nowrap" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Título</th>
                  <th>Categoría</th>
                  <th>Autor</th>
                  <th>Ultima modificación</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Título</th>
                  <th>Categoría</th>
                  <th>Autor</th>
                  <th>Ultima modificación</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </tfoot>
              <tbody>
                @forelse( $posts as $post)
                  <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ str_limit($post->title, 80, '...') }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->user->first_name }} {{ $post->user->last_name }}</td>
                    <td><span>{{ $post->updated_at }}</span>{{ $post->updated_at->format('d-m-Y H:i') }}</td>
                    <td class="text-center">
                      <form id="delete" action="{{ route('posts.eliminar', $post->id ) }}" method="post">
                        @csrf
                        @if($post->user->id == auth()->user()->id || (Auth::user()->hasRole('Director ejecutivo')))
                          <a class="btn btn-link" href="{{ route('posts.editar', ['id' => $post->id]) }}" title="Editar">
                            <i class="far fa-edit"></i>
                          </a>
                        @elseif($post->user->role->name == ('Periodista') && (Auth::user()->hasAnyRole(['Director ejecutivo', 'Administrador'])))
                          <a class="btn btn-link" href="{{ route('posts.editar', ['id' => $post->id]) }}" title="Editar">
                            <i class="far fa-edit"></i>
                          </a>
                        @endif
                        @if($post->user->id == auth()->user()->id || (Auth::user()->hasRole('Director ejecutivo')))
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                          <a class="btn btn-link" href="#" data-toggle="modal" data-target="#deleteModal">
                            <i class="far fa-trash-alt"></i>
                          </a>
                        @endif
                        <a class="btn btn-link" href="{{ route('posts.mostrar', ['id' => $post->id]) }}" title="Ver detalles">
                          <i class="fas fa-info-circle"></i>
                        </a>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr>No hay posts registrados.</tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Actualizado el {{ $last_update->format('d-m-Y') }} a las {{ $last_update->format('H:i') }}</div>
      </div>
    @include('admin.common.deleteModal', ['object' => 'post'])
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
