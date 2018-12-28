@extends('layout')

@section('title', "$query - Buscar en Revista Forum")

@section('carousel')
  <!-- Carousel -->
  <div class="carousel-container">
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
  </div>
  <aside class="gap">
  </aside>
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
        @if(!$columnists->isEmpty())
          <div class="sb-div">
            <div class="sb-columnistas">
              <h3>Columnistas</h3>
              <ul class="text-center bg-container-gray">
                @foreach ($columnists as $columnist)
                  <li>
                    <h5>{{$columnist->name}}</h5>
                    @if($columnist->avatar != null)
                    <img src="../../img/columnists/{{ $columnist->avatar }}" class="author-avatar">
                    @endif
                    <h6><a class="titulo-columna" href="{{ route('columna', [$columnist->columns()->pluck('slug')->last(), $columnist->columns()->pluck('id')->last()]) }}">{{ $columnist->columns()->pluck('title')->last() }}</a></h6>
                    <p>{!!str_limit($columnist->columns()->pluck('body')->last(), 180)!!}</p>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        @endif
        <div class="sb-div">
          <h3>Siguenos</h3>
          <div class="sb-rrss bg-container-gray text-center">
              <a class="btn azm-social azm-size-36 azm-circle azm-long-shadow azm-facebook" target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/RevistaForum/"><i class="fab fa-facebook"></i></a>
              <a class="btn azm-social azm-size-36 azm-circle azm-long-shadow azm-twitter" target="_blank" rel="noopener noreferrer" href="https://twitter.com/forumchile"><i class="fab fa-twitter"></i></a>
              <a class="btn azm-social azm-size-36 azm-circle azm-long-shadow azm-instagram" target="_blank" rel="noopener noreferrer" href="https://www.instagram.com/revistaforumchile/"><i class="fab fa-instagram"></i></a>
              <a class="btn azm-social azm-size-36 azm-circle azm-long-shadow azm-youtube-play" href="#"><i class="fab fa-youtube"></i></a>
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
  }, 800);
  </script>
@endsection
