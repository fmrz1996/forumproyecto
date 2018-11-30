@extends('layout')

@section('title', "$query - Buscar en Revista Forum")

@section('carousel')
  <!-- Carousel -->
  <div class="container-fluid text-center">
    <div class="row">
      <div class="full-width-row">
        <div id="carousel" class="slick-frame">
          @foreach ($carousel as $post)
            <div style="position: relative;">
              <a href="{{ route('noticia', [str_slug($post->category->name), $post->slug, $post->id]) }}">
                <img class="img-fluid img-slider" src="../img/{{ $post->background }}">
                <div class="slider-post">
                  <h3>{{ $post->title }}</h3>
                </div>
              </a>
            </div>
          @endforeach
        </div>
          <aside class="gap">
          </aside>
      </div>
    </div>
  </div>
@endsection

@section('content')
  <!-- Cuerpo de Página -->
  <div id="main" class="container">
    <div class="row mb-4">
      <div class="col-sm-12 col-md-9">
        <h4 class="font-weight-light mb-4">Mostrando resultados de:</h4>
        <h1 class="search-header pl-2"><i class="fas fa-search pr-4"></i>{{ $query }}</h1>
        <script>
          (function() {
            var cx = '011781419241067486073:ty9gotmfzpg';
            var gcse = document.createElement('script');
            gcse.type = 'text/javascript';
            gcse.async = true;
            gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(gcse, s);
          })();
        </script>
        <gcse:searchresults-only></gcse:searchresults-only>
      </div>
@endsection

@section('sidebar')
    <!-- Sidebar -->
    <div id="sidebar" class="col-sm-12 col-md-3 sidebar">
        <div class="sb-div">
          <div class="sb-columnistas">
            <h3>Columnistas</h3>
            <ul class="text-center bg-container-gray">
              <li>
                <h5>Benito Pérez</h5>
                <p>Quien más agita la denuncia del peligro de invasión que representan los desvalidos del sur, son los ricos del norte, que claman por más fronteras y más identidad...</p>
              </li>
              <li>
                <h5>Enzo Monje</h5>
                <p>No es el momento de hacerlo, porque andamos discutiendo cuestiones de género, pero es tan bueno que sería procedente incorporar al castellano...</p>
              </li>
              <li>
                <h5>Sergio Romero</h5>
                <p>Su afán está en consonancia con la urgencia del nombre: es tan movilizador que exige la ausencia de otros eslóganes...</p>
              </li>
            </ul>
          </div>
        </div>
        <div class="sb-div">
          <h3>Siguenos</h3>
          <div class="sb-rrss bg-container-gray text-center">
              <a class="btn azm-social azm-size-36 azm-circle azm-long-shadow azm-facebook" target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/RevistaForum/"><i class="fab fa-facebook"></i></a>
              <a class="btn azm-social azm-size-36 azm-circle azm-long-shadow azm-twitter" target="_blank" rel="noopener noreferrer" href="#"><i class="fab fa-twitter"></i></a>
              <a class="btn azm-social azm-size-36 azm-circle azm-long-shadow azm-instagram" target="_blank" rel="noopener noreferrer" href="#"><i class="fab fa-instagram"></i></a>
              <a class="btn azm-social azm-size-36 azm-circle azm-long-shadow azm-youtube-play" target="_blank" rel="noopener noreferrer" href="#"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
        <div class="sb-div">
          <h3>Visita</h3>
          <a target="_blank" rel="noopener noreferrer" href="http://forumradio.cl/">
            <img class="img-fluid" src="../img/logo-radio.png" alt="Ingresa a Radio Forum">
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script type="text/javascript">
  setTimeout(function (){
    $('#carousel').slick({
      autoplay: true,
      autoplaySpeed: 4000,
      infinite: true,
      slidesToShow: 3,
      speed: 500,
      prevArrow: '<div class="slick-nav slick-prev"><i class="fas fa-chevron-circle-left"></i></div>',
      nextArrow: '<div class="slick-nav slick-next"><i class="fas fa-chevron-circle-right"></i></div>',
      responsive: [
        {
          breakpoint: 768,
          settings: {
            arrows: false,
            slidesToShow: 1
          }
        }
      ]
    });
  }, 100);
  </script>
@endsection
