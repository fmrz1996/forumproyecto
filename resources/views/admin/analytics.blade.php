@extends('admin.layout')

@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="/admin">Inicio</a>
    </li>
    <li class="breadcrumb-item active">Análisis</li>
  </ol>
  <div class="card mb-3">
    <div class="card-header">
      <h4><a href="{{ route('admin.analisis') }}"><i class="fas fa-chart-bar"></i>  Análisis (30 días)</a></h4>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>Audiencia:</h6>
          <canvas class="mb-4" id="areaChart" width="400" height="250"></canvas>
        </div>
        <div class="col-sm-12 col-md-6">
          <h6>Sesiones de sistemas operativos:</h6>
          <canvas class="mb-4" id="pieChart" width="400" height="250"></canvas>
        </div>
      </div>
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
                <td><a href="{{ $page['url'] }}">{{ str_limit($page['url'], 100) }}</a></td>
                <td class="text-center">{{ $page['pageViews'] }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <h6>Referentes:</h6>
          <table class="table nowrap mt-3" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>#</th>
                <th>Página</th>
                <th class="text-center">Visitas</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($topReferrers as $page)
              <tr>
                <td>{{ $loop->iteration }}.</td>
                <td>{{ $page['url'] }}</td>
                <td class="text-center">{{ $page['pageViews'] }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
    <div class="card-footer small text-muted">Para más información diríjase a: <a href="https://analytics.google.com/analytics/web/">Google Analytics</a></div>
  </div>
@endsection

@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

  <script>
  var areaChartCanvas = $("#areaChart").get(0).getContext("2d");

  var myChart = new Chart(areaChartCanvas, {
    type: 'line',
    data: {
      labels: {!! json_encode($dates->map(function($date) { return $date->format('d/m'); })) !!},

          datasets: [
            {
              label: "Visitas",
              lineTension: 0.2,
              backgroundColor: "rgb(33,150,243,0.2)",
              borderColor: "rgb(33,150,243,1)",
              pointRadius: 3.5,
              pointBackgroundColor: "rgb(33,150,243,1)",
              pointBorderColor: "rgb(33,150,243,0.8)",
              pointHoverRadius: 4,
              pointHoverBackgroundColor: "rgb(33,150,243,0.8)",
              pointHitRadius: 10,
              pointBorderWidth: 1,
              data: {!! json_encode($pageViews) !!}
            },
            {
              label: "Lectores",
              lineTension: 0.2,
              backgroundColor: "rgb(33,150,243,0.8)",
              borderColor: "rgb(33,150,243,1)",
              pointRadius: 3.5,
              pointBackgroundColor: "rgb(33,150,243,1)",
              pointBorderColor: "rgba(255,255,255,0.8)",
              pointHoverRadius: 4,
              pointHoverBackgroundColor: "rgb(33,150,243,1)",
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

  <script>
  var pieChartCanvas = $("#pieChart").get(0).getContext("2d");

  var myChart = new Chart(pieChartCanvas, {
    type: 'pie',
    data: {
      labels: {!! json_encode($topSystems[0]) !!},
      datasets: [
        {
          backgroundColor: ["#2196f3", "#f44336", "#4caf50", "#ffeb3b", "#9c27b0", "#ff5722", "#cddc39", "#795548", "#009688", "#607d8b"],
          data: {!! json_encode($topSystems[1]) !!}
        }]
      }
    });
  </script>
@endsection
