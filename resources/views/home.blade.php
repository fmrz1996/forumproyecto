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
              <div style="position: relative;">
                <a href="/noticia">
                  <img class="img-fluid img-slider" src="../img/img1.jpg">
                  <div class="slider-post">
                    <h3>El primer vestido hecho con telarañas silvestres</h3>
                  </div>
                </a>
              </div>
              <div style="position: relative;">
                <a href="/noticia">
                  <img class="img-fluid img-slider" src="../img/img2.jpg">
                  <div class="slider-post">
                    <h3>Mirar a los ojos reduciría notablemente el estrés</h3>
                  </div>
                </a>
              </div>
              <div style="position: relative;">
                <a href="/noticia">
                  <img class="img-fluid img-slider" src="../img/img3.jpg">
                  <div class="slider-post">
                    <h3>Como vestirse con clase sin ser rico</h3>
                  </div>
                </a>
              </div>
              <div style="position: relative;">
                <a href="/noticia">
                  <img class="img-fluid img-slider" src="../img/img4.jpg">
                  <div class="slider-post">
                    <h3>No te pierdas lo último de la semana dieciochera</h3>
                  </div>
                </a>
              </div>
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
        <div id="posts" class="col-sm-12 col-md-9 posts">
          @forelse ($posts as $post)
          <article>
            <div class="row align-middle">
              <div class="col-sm-12 col-md-6">
                <figure class="opacity">
                  <a href="{{ route('noticia', [str_slug($post->category->name), $post->slug, $post->id]) }}">
                    <img class="img-fluid img-post" src="../img/{{ $post->background }}">
                  </a>
                </figure>
              </div>
              <div class="col-sm-12 col-md-6">
                <div class="etiqueta-post">
                  <aside class="categoria-post">
                    <i class="far fa-file-alt"></i>
                    <a href="../{{ str_slug($post->category->name) }}">{{ $post->category->name }}</a>
                  </aside>
                  <aside class="date-post">
                    <i class="far fa-calendar-alt"></i>
                    {{ $post->created_at->format('d-m-Y') }}
                  </aside>
                </div>
                <header class="header-post">
                  <h3>
                    <a class="titulo-post" href="{{ route('noticia', [str_slug($post->category->name), $post->slug, $post->id]) }}">
                      <span class="keyword-post">#{{ mb_strtolower($post->tags->pluck('name')->random()) }}</span>
                      {{ $post->title }}
                    </a>
                  </h3>
                </header>
                <div class="contenido-post">
                  {{ $post->header == null ? strip_tags(html_entity_decode(str_limit($post->body, 250, '...'))) : $post->header }}
                  <footer class="links-post">
                    <a class="btn azm-outpost azm-size-36 azm-r-square azm-comment" href="{{ route('noticia', [str_slug($post->category->name), $post->slug, $post->id]) }}#comentarios"><i class="far fa-comment"></i></a>
                    <aside class="btn links-post-loop azm-outpost azm-size-36 azm-r-square azm-share">
                      <i class="fas fa-share-square"></i>
                        <a class="btn azm-size-36 m-0 azm-social azm-share-social azm-facebook share-link" href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}&amp;src=sdkpreparse"><i class="fab fa-facebook"></i></a>
                        <a class="btn azm-size-36 m-0 azm-social azm-share-social azm-twitter share-link" href="https://twitter.com/share?ref_src=twsrc%5Etf&text={{ $post->title }}&via=revistaforum"><i class="fab fa-twitter"></i></a>
                    </aside>
                  </footer>
                </div>
              </div>
            </div>
          </article>
          @empty
          <p>No hay posts registrados.</p>
          @endforelse
        </div>

        {{-- Sidebar --}}
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
