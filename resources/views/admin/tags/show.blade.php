  @extends('admin.layout')

  @section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/admin">Inicio</a>
      </li>
      <li class="breadcrumb-item">
        <a href="/admin/tags">Tags</a>
      </li>
      <li class="breadcrumb-item active">Detalles</li>
    </ol>

    @include('admin.common.success')

    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Tag #{{ $tag->id }}</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <th>Nombre:</th>
                  <td>{{ $tag->name }}</td>
                </tr>
                <tr>
                  <th>Usado en:</th>
                  <td>{{ $tag->posts()->count() }} posts</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      @if(!$tag->posts->isEmpty())
      <div class="card card-register mx-auto mt-5 mb-5">
        <div class="card-header">
          <i class="fas fa-table"></i>
          Posts que contienen el tag {{ $tag->name }}
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Título</th>
                  <th>Autor</th>
                  <th>Ultima modificación</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Título</th>
                  <th>Autor</th>
                  <th>Ultima modificación</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </tfoot>
              <tbody>
                @forelse($tag->posts as $post)
                  <tr>
                    <td>{{ $post->id}}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->user->first_name }} {{ $post->user->last_name }}</td>
                    <td>{{ $post->updated_at->format('d-m-Y H:i') }}</td>
                    <td class="text-center">
                      @if($post->user->id == auth()->user()->id || (Auth::user()->hasRole('Administrador')))
                      <form class="delete" action="{{ route('posts.eliminar', $post->id ) }}" method="post">
                        <a class="btn btn-link" href="{{ route('posts.editar', ['id' => $post->id]) }}" title="Editar">
                          <i class="far fa-edit"></i>
                        </a>
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button class="btn btn-link" type="submit" name="button" title="Eliminar">
                          <i class="far fa-trash-alt"></i>
                        </button>
                        <a class="btn btn-link" href="{{ route('posts.mostrar', ['id' => $post->id]) }}" title="Ver detalles">
                          <i class="fas fa-info-circle"></i>
                        </a>
                      </form>
                      @else
                        <a class="btn btn-link" href="{{ route('posts.mostrar', ['id' => $post->id]) }}" title="Ver detalles">
                          <i class="fas fa-info-circle"></i>
                        </a>
                      @endif
                    </td>
                  </tr>
                @empty
                  <tr>No hay posts registrados.</tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
      @endif
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
          ],
          "order": [[3, "desc"]]
        });
      });
    </script>
    <script>
        $(".delete").on("submit", function(){
            return confirm("¿Realmente deseas eliminar el post?");
        });
    </script>
  @endsection
