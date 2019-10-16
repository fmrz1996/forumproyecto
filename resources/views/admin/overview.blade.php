@extends('admin.layout')

@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="/admin">Inicio</a>
    </li>
    <li class="breadcrumb-item active">Vista general</li>
  </ol>
  <div class="card mb-3">
    <div class="card-header">
      <h4>
        @if(Auth::user()->hasAnyRole(['Director ejecutivo', 'Administrador']))
        <a href="{{ route('admin.analisis') }}">
          <i class="fas fa-chart-bar"></i>  Análisis (7 días)
        </a>
        @else
          <i class="fas fa-chart-bar"></i>  Análisis (7 días)
        @endif
      </h4>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>Audiencia:</h6>
          <canvas class="mb-3" id="areaChart" width="400" height="250"></canvas>
        </div>
        <div class="col-sm-12 col-md-6">
          <h6>Páginas más visitadas:</h6>
          <table class="table nowrap mt-3" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>#</th>
                <th>Página</th>
                <th class="text-center">Visitas</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($mostViewedPages as $page)
              <tr>
                <td>{{ $loop->iteration }}.</td>
                <td><a href="{{ $page['url'] }}">{{ $page['url'] }}</a></td>
                <td class="text-center">{{ $page['pageViews'] }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @if(!$suggestions[0]->isEmpty() || !$suggestions[1]->isEmpty() || !$suggestions[2]->isEmpty() || !$suggestions[3]->isEmpty())
    <div class="card mb-3">
      <div class="card-header">
        <h4>
          @if(Auth::user()->hasAnyRole(['Director ejecutivo', 'Administrador']))
          <a href="{{ route('admin.sugerencias') }}">
            <i class="fas fa-exclamation-circle"></i>  Sugerencias
          </a>
          @else
            <i class="fas fa-exclamation-circle"></i>  Sugerencias
          @endif
        </h4>
      </div>
      <div class="card-body">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <h6>Agregar encabezado a los siguientes posts:</h6>
              <ul class="list-unstyled list-padding">
                @forelse ($suggestions[0] as $post)
                  <li><a href="{{ route('posts.editar', ['id' => $post->id]) }}"><i class="far fa-edit"></i></a>  {{ str_limit($post->title, 60, '...') }}</li>
                @empty
                  <li style="list-style-type: disc">¡Todo en orden!, revise las otras sugerencias.</li>
                @endforelse
              </ul>
            </div>
            <div class="col-sm-12 col-md-6">
              <h6>Agregar tags a los siguientes posts:</h6>
              <ul class="list-unstyled list-padding">
                @forelse ($suggestions[1] as $post)
                  <li><a href="{{ route('posts.editar', ['id' => $post->id]) }}"><i class="far fa-edit"></i></a>  {{ str_limit($post->title, 60, '...') }}</li>
                @empty
                  <li style="list-style-type: disc">¡Todo en orden!, revise las otras sugerencias.</li>
                @endforelse
              </ul>
            </div>
          </div>
          <hr>
          <div class="row">
            @if(Auth::user()->hasAnyRole(['Director ejecutivo', 'Administrador']))
              <div class="col-sm-12 col-md-6">
                <h6>Agregar descripción a los siguientes usuarios:</h6>
                <ul class="list-unstyled list-padding">
                  @forelse ($suggestions[2] as $user)
                    <li><a href="{{ route('usuarios.editar', ['id' => $user->id]) }}"><i class="far fa-edit"></i></a>  {{ $user->first_name }} {{ $user->last_name }}</li>
                  @empty
                    <li style="list-style-type: disc">¡Todo en orden!, revise las otras sugerencias.</li>
                  @endforelse
                </ul>
              </div>
              <div class="col-sm-12 col-md-6">
                <h6>Agregar avatar a los siguientes usuarios:</h6>
                <ul class="list-unstyled list-padding">
                  @forelse ($suggestions[3] as $user)
                    <li><a href="{{ route('usuarios.editar', ['id' => $user->id]) }}"><i class="far fa-edit"></i></a>  {{ $user->first_name }} {{ $user->last_name }}</li>
                  @empty
                    <li style="list-style-type: disc">¡Todo en orden!, revise las otras sugerencias.</li>
                  @endforelse
                </ul>
              </div>
            @else
              <div class="col-sm-12">
                <h6>Considera realizar las siguientes acciones:</h6>
                <ul class="list-unstyled list-padding">
                  @if($suggestions[2]->isNotEmpty())
                    <li><a href="{{ route('usuarios.editar', ['id' => Auth::user()->id]) }}"><i class="far fa-edit"></i></a>  Agregar descripción a tu perfil</li>
                  @endif
                  @if($suggestions[3]->isNotEmpty())
                    <li><a href="{{ route('usuarios.editar', ['id' => Auth::user()->id]) }}"><i class="far fa-edit"></i></a>  Agregar avatar a tu perfil</li>
                  </div>
                  @endif
                </ul>
            @endif
          </div>
      </div>
    </div>
  @endif
  @if(Auth::user()->hasAnyRole(['Director ejecutivo', 'Administrador']))
  <div class="card mb-3">
    <div class="card-header">
      <h4><a href="{{ route('admin.estadisticas') }}"><i class="fas fa-chart-line"></i>  Estadísticas (30 días)</a></h4>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>Actividad:</h6>
              <ul>
                <li>Usuario más activo: @if(!empty($statistics[0])) {{ $statistics[0]->first_name .' ' .$statistics[0]->last_name .' (' .$statistics[0]->posts_count .' posts)' }} @else <span class="font-italic">No registrado</span> @endif</li>
                <li>Categoría más usada: @if(!empty($statistics[1])) {{ $statistics[1]->name .' (' .$statistics[1]->posts_count .' posts)' }} @else <span class="font-italic">No registrado</span> @endif</li>
              </ul>
            </div>
            <div class="col-sm-12 col-md-6">
              <h6>Palabras claves más usadas:</h6>
              <ul>
              @forelse ($statistics[2] as $tag)
                <li>{{ $tag->name .': ' .$tag->posts_count .' veces' }}</li>
              @empty
                <li><span class="font-italic">No registrado</span></li>
              @endforelse
            </ul>
          </div>
        </div>
      </div>
    </div>
  @endif
@endsection

@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

  <script>
  var areaChartCanvas = $("#areaChart").get(0).getContext("2d");

  var myChart = new Chart(areaChartCanvas, {
    type: 'line',
    data: {

          /* En caso que se utilize Google Analytics:
          labels: {json_encode($dates->map(function($date) { return $date->format('d/m'); })) !!} */
          labels: {!! json_encode($dates) !!},

          datasets: [
            {
              label: "Visitas",
              lineTension: 0.3,
              backgroundColor: "rgba(2,117,216,0.2)",
              borderColor: "rgba(2,117,216,1)",
              pointRadius: 3.5,
              pointBackgroundColor: "rgba(2,117,216,1)",
              pointBorderColor: "rgba(255,255,255,0.8)",
              pointHoverRadius: 4,
              pointHoverBackgroundColor: "rgba(2,117,216,1)",
              pointHitRadius: 10,
              pointBorderWidth: 1,
              data: {!! json_encode($pageViews) !!}
            },
            {
              label: "Lectores",
              lineTension: 0.3,
              backgroundColor: "rgba(2,117,216,0.8)",
              borderColor: "rgba(2,117,216,1)",
              pointRadius: 3.5,
              pointBackgroundColor: "rgba(2,117,216,1)",
              pointBorderColor: "rgba(255,255,255,0.8)",
              pointHoverRadius: 4,
              pointHoverBackgroundColor: "rgba(2,117,216,1)",
              pointHitRadius: 10,
              pointBorderWidth: 1,
              data: {!! json_encode($visitors) !!}
            }
          ]
        },
        options: {
            scales: {
                xAxes: [{
                    gridLines: {
                        color: "rgba(0, 0, 0, 0)",
                    }
                }]
            }
        }

      });
  </script>
@endsection
