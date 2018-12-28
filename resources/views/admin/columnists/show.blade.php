  @extends('admin.layout')

  @section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/admin">Inicio</a>
      </li>
      <li class="breadcrumb-item">
        <a href="/admin/columnistas">Columnistas</a>
      </li>
      <li class="breadcrumb-item active">Detalles</li>
    </ol>

    @include('admin.common.success')

    <div class="card card-register mx-auto mt-5">
      <div class="card-header">
        Columnista #{{ $columnist->id }}
        <div class="float-right">
          <a href="{{ route('columnistas.editar', $columnist->id) }}">
            <i class="far fa-edit"></i> Editar
          </a>
          @if(!$columnist->columns->isEmpty())
            <a class="pl-2" href="#columns">
              <i class="far fa-eye"></i> Ver Columnas
            </a>
          @endif
        </div>
      </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <th>Nombre:</th>
                  <td>{{ $columnist->name }}</td>
                </tr>
                <tr>
                  <th>Ocupación:</th>
                  @if($columnist->occupation != null)
                  <td>{{ $columnist->occupation }}</td>
                  @else
                  <td><span class="font-italic">No registrado</span></td>
                  @endif
                </tr>
                <tr>
                  <th>Avatar:</th>
                  @if($columnist->avatar != null)
                  <td><img class="show-img" src="../../../img/columnists/{{ $columnist->avatar }}"></td>
                  @else
                  <td><span class="font-italic">No registrado</span></td>
                  @endif
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      @if(!$columnist->columns->isEmpty())
      <div id="columns" class="card mx-auto mt-5 mb-5">
        <div class="card-header">
          <i class="fas fa-table"></i>
          Columnas creadas por {{ $columnist->name }}
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered nowrap" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Título</th>
                  <th>Ultima modificación</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Título</th>
                  <th>Ultima modificación</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </tfoot>
              <tbody>
                @forelse($columnist->columns as $column)
                  <tr>
                    <td>{{ $column->id }}</td>
                    <td>{{ str_limit($column->title, 80, '...') }}</td>
                    <td>{{ $column->updated_at->format('d-m-Y H:i') }}</td>
                    <td class="text-center">
                      <form class="delete" action="{{ route('columnas.eliminar', $column->id ) }}" method="post">
                        <a class="btn btn-link" href="{{ route('columnas.editar', ['id' => $column->id]) }}" title="Editar">
                          <i class="far fa-edit"></i>
                        </a>
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button class="btn btn-link" type="submit" name="button" title="Eliminar">
                          <i class="far fa-trash-alt"></i>
                        </button>
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
    <script type="text/javascript">
      $('a[href*=\\#columns]').on('click', function(event){
          event.preventDefault();
          $('html,body').animate({scrollTop:$(this.hash).offset().top - 10}, 700);
      });
    </script>
  @endsection
