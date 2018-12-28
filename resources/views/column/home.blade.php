    @extends('layout')

    @if(isset($tag))
      @section('title', "Tag ".str_replace("-", " ", ucfirst($tag)). " - Revista Forum")
    @elseif(isset($category))
      @section('title', "".ucfirst($category). " - Revista Forum")
    @else
      @section('title', "Revista Forum - Noticias, actualidad y tendencia profesional")
    @endif

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
      <div class="row">
        <div id="columns" class="col-sm-12 col-md-9 columns">
          @forelse ($columns as $column)
          <article>
            <div class="row align-middle">
              <div class="col-sm-12">
                <div class="etiqueta-post">
                  <aside class="categoria-post">
                    <i class="fas fa-user"></i>
                    {{ $column->columnist->name }}
                  </aside>
                  <aside class="date-post">
                    <i class="far fa-calendar-alt"></i>
                    {{ $column->created_at->format('d-m-Y') }}
                  </aside>
                </div>
                <header class="header-post">
                  <h3>
                    <a class="titulo-post" href="{{ route('columna', [$column->slug, $column->id]) }}">
                      {{ $column->title }}
                    </a>
                  </h3>
                </header>
              </div>
            </div>
          </article>
          @empty
          <p>No hay columnas registradas.</p>
          @endforelse
          {!! $columns->render() !!}
        </div>
        @endsection

      @section('sidebar')
      <!-- Sidebar -->
        <div id="sidebar" class="col-sm-12 col-md-3 sidebar">
            <div class="sb-div">
              <h3>Siguenos</h3>
              <div class="sb-rrss bg-container-gray text-center">
                  <a class="btn azm-social azm-size-36 azm-circle azm-long-shadow azm-facebook" target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/RevistaForum/"><i class="fab fa-facebook"></i></a>
                  <a class="btn azm-social azm-size-36 azm-circle azm-long-shadow azm-twitter" target="_blank" rel="noopener noreferrer" href="https://twitter.com/forumchile"><i class="fab fa-twitter"></i></a>
                  <a class="btn azm-social azm-size-36 azm-circle azm-long-shadow azm-instagram" target="_blank" rel="noopener noreferrer" href="https://www.instagram.com/revistaforumchile/"><i class="fab fa-instagram"></i></a>
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
          prevArrow: '<div class="slick-nav slick-prev"><img class="img-fluid" src="../css/arrow.png"></img></div>',
          nextArrow: '<div class="slick-nav slick-next"><img class="img-fluid" src="../css/arrow.png" style="transform: rotate(180deg);"></img></div>',
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

      <script type="text/javascript">
          $("#header-fixed").hide();
          var headerSlide = document.getElementById("header-fixed");
          var topItem = $("#carousel").offset().top + 300;

          $(window).scroll(function() {
              if($(window).scrollTop() > topItem) {
                  $("#header-fixed").show();
                  headerSlide.classList.add("slide");
              } else {
                headerSlide.classList.remove("slide");
              }
          });
      </script>

      <script>
      $(document).ready(function() {
          $('.share-link').click(function(e) {
              e.preventDefault();
              window.open($(this).attr('href'), 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
              return false;
          });
      });
      </script>
    @endsection
