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

    @include('admin.common.success')

    <div class="card card-register mx-auto mt-5">
      <div class="card-header">
        Usuario #{{ $user->id }}
        <a class="float-right" href="{{ route('usuarios.editar', $user->id) }}">
          <i class="far fa-edit"></i> Editar
        </a>
      </div>
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
                  <th>Rol:</th>
                  <td>{{ $user->role->name }}</td>
                </tr>
                <tr>
                  <th>Descripción:</th>
                  @if ($user->description != null)
                    <td>{{ $user->description }}</td>
                  @else
                    <td><span class="font-italic">No registrado</span></td>
                  @endif
                </tr>
                <tr>
                  <th>Estado:</th>
                  @if($user->is_active == 1)
                    <td>Activo</td>
                  @else
                    <td>Inactivo</td>
                  @endif
                </tr>
                <tr>
                  <th>Fecha de creación:</th>
                  <td>{{ $user->created_at->format('d-m-Y H:i')}}</td>
                </tr>
                <tr>
                  <th>Avatar:</th>
                  @if($user->avatar != null)
                  <td><img class="show-img" src="../../../img/users/{{ $user->avatar }}"></td>
                  @else
                  <td><span class="font-italic">No registrado</span></td>
                  @endif
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      @if(!$user->posts->isEmpty())
      <div class="card card-register mx-auto mt-5 mb-5">
        <div class="card-header">
          <i class="fas fa-table"></i>
          Posts creados por {{ $user->first_name }} {{ $user->last_name }}
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered nowrap" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Título</th>
                  <th>Categoría</th>
                  <th>Ultima modificación</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Título</th>
                  <th>Categoría</th>
                  <th>Ultima modificación</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </tfoot>
              <tbody>
                @forelse($user->posts as $post)
                  <tr>
                    <td>{{ str_limit($post->title, 60, '...') }}</td>
                    <td>{{ $post->user->first_name }} {{ $post->user->last_name }}</td>
                    <td>{{ $post->updated_at->format('d-m-Y H:i') }}</td>
                    <td class="text-center">
                      <form class="delete" action="{{ route('posts.eliminar', $post->id ) }}" method="post">
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
                        <button class="btn btn-link" type="submit" name="button" title="Eliminar">
                          <i class="far fa-trash-alt"></i>
                        </button>
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
            { "orderable": false, "targets": 3}
          ],
          "order": [[2, "desc"]]
        });
      });
    </script>
    <script>
        $(".delete").on("submit", function(){
            return confirm("¿Realmente deseas eliminar el post?");
        });
    </script>
  @endsection
