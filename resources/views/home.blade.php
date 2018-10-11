  @extends('layout')

  @section('title', "Forum Comunidad")

  @section('carousel')
    <!-- Carousel -->
    <div class="container-fluid text-center">
      <div class="row">
        <div class="full-width-row">
          <div id="carousel" class="slick-frame">
            <div style="position: relative;">
              <a href="/noticia">
                <img class="img-fluid img-slider" src="img/img1.jpg">
                <div class="slider-post">
                  <h3>El primer vestido hecho con telarañas silvestres</h3>
                </div>
              </a>
            </div>
            <div style="position: relative;">
              <a href="/noticia">
                <img class="img-fluid img-slider" src="img/img2.jpg">
                <div class="slider-post">
                  <h3>Mirar a los ojos reduciría notablemente el estrés</h3>
                </div>
              </a>
            </div>
            <div style="position: relative;">
              <a href="/noticia">
                <img class="img-fluid img-slider" src="img/img3.jpg">
                <div class="slider-post">
                  <h3>Como vestirse con clase sin ser rico</h3>
                </div>
              </a>
            </div>
            <div style="position: relative;">
              <a href="/noticia">
                <img class="img-fluid img-slider" src="img/img4.jpg">
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
      <article>
        <div class="row align-middle">
          <div class="col-sm-12 col-md-6">
            <figure class="opacity">
              <a href="/noticia">
                <img class="img-fluid img-post" src="img/valle-itata.jpg" alt="">
              </a>
            </figure>
          </div>
          <div id="actualidad" class="col-sm-12 col-md-6">
            <div class="etiqueta-post">
              <aside class="categoria-post">
                <i class="far fa-file-alt"></i>
                <a href="#">Actualidad</a>
              </aside>
              <aside class="date-post">
                <i class="far fa-calendar-alt"></i>
                12 Julio 2018
              </aside>
            </div>
            <header class="header-post">
              <h3>
                <a class="titulo-post" href="/noticia">
                  <span class="keyword-post">#viña</span>
                  Las 4 nuevas rutas turísticas Valle del Itata
                </a>
              </h3>
            </header>
            <div class="contenido-post">
              <p>"Viñas y Observación de aves", "Aventura campo y mar", "Alma del Valle" y "Ruta Agroecológica patrimonial" son los nombres de las nuevas rutas disponibles para los turistas en el Valle del Itata con alto valor identitario y patrimonial.</p>
              <footer class="links-post">
                <a class="btn azm-social azm-outpost azm-size-36 azm-r-square azm-comment" href="/noticia#commentsLine"><i class="far fa-comment"></i></a>
                <a class="btn azm-social azm-outpost azm-size-36 azm-r-square azm-share" href="#"><i class="fas fa-share-square"></i></a>
              </footer>
            </div>
          </div>
        </div>
      </article>
      <article>
        <div class="row align-middle">
          <div class="col-sm-12 col-md-6">
            <figure class="opacity">
              <a href="/noticia">
                <img class="img-fluid img-post" src="img/saludable.jpg" alt="">
              </a>
            </figure>
          </div>
        <div id="sociedad" class="col-sm-12 col-md-6">
          <div class="etiqueta-post">
            <aside class="categoria-post">
              <i class="far fa-file-alt"></i>
              <a href="#">Sociedad</a>
            </aside>
            <aside class="date-post">
              <i class="far fa-calendar-alt"></i>
              12 Julio 2018
            </aside>
          </div>
          <header class="header-post">
            <h3>
              <a class="titulo-post" href="/noticia">
                <span class="keyword-post">#comida</span>
                Tecnología para hacer alimentos más saludables
              </a>
            </h3>
          </header>
          <div class="contenido-post">
            <p>En la actualidad se procesan 3,2 millones de toneladas de aceite al año en el mundo, de las cuales 15 mil toneladas corresponde a  almazaras chilenas.</p>
            <footer class="links-post">
              <a class="btn azm-social azm-outpost azm-size-36 azm-r-square azm-comment" href="/noticia#commentsLine"><i class="far fa-comment"></i></a>
              <a class="btn azm-social azm-outpost azm-size-36 azm-r-square azm-share" href="#"><i class="fas fa-share-square"></i></a>
            </footer>
          </div>
        </div>
      </div>
    </article>
    <article>
      <div class="row align-middle">
        <div class="col-sm-12 col-md-6">
          <figure class="opacity">
            <a href="/noticia">
              <img class="img-fluid img-post" src="img/plaza-armas.jpg" alt="">
            </a>
          </figure>
        </div>
        <div id="cultura" class="col-sm-12 col-md-6">
          <div class="etiqueta-post">
            <aside class="categoria-post">
              <i class="far fa-file-alt"></i>
              <a href="#">Cultura</a>
            </aside>
            <aside class="date-post">
              <i class="far fa-calendar-alt"></i>
              12 Julio 2018
            </aside>
          </div>
          <header class="header-post">
            <h3>
              <a class="titulo-post" href="/noticia">
                <span class="keyword-post">#ñuble</span>
                La Región de Ñuble en cuenta regresiva
              </a>
            </h3>
          </header>
          <div class="contenido-post">
            <p>El anhelo surgió hace dos décadas, el primer estudio formal para sustentar su creación se gestó a comienzos de siglo y la idea de legislar a inicios de la actual década.</p>
            <footer class="links-post">
              <a class="btn azm-social azm-outpost azm-size-36 azm-r-square azm-comment" href="/noticia#commentsLine"><i class="far fa-comment"></i></a>
              <a class="btn azm-social azm-outpost azm-size-36 azm-r-square azm-share" href="#"><i class="fas fa-share-square"></i></a>
            </footer>
          </div>
        </div>
      </div>
    </article>
    <article>
      <div class="row align-middle">
        <div class="col-sm-12 col-md-6">
          <figure class="opacity">
            <a href="/noticia">
              <img class="img-fluid img-post" src="img/post2.jpeg" alt="">
            </a>
          </figure>
        </div>
        <div id="tecnologia" class="col-sm-12 col-md-6">
          <div class="etiqueta-post">
            <aside class="categoria-post">
              <i class="far fa-file-alt"></i>
              <a href="#">Tecnologia</a>
            </aside>
            <aside class="date-post">
              <i class="far fa-calendar-alt"></i>
              12 Julio 2018
            </aside>
          </div>
          <header class="header-post">
            <h3>
              <a class="titulo-post" href="/noticia">
                <span class="keyword-post">#cyberday</span>
                Tecnologia
              </a>
            </h3>
          </header>
          <div class="contenido-post">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <footer class="links-post">
              <a class="btn azm-social azm-outpost azm-size-36 azm-r-square azm-comment" href="/noticia#commentsLine"><i class="far fa-comment"></i></a>
              <a class="btn azm-social azm-outpost azm-size-36 azm-r-square azm-share" href="#"><i class="fas fa-share-square"></i></a>
            </footer>
          </div>
        </div>
      </div>
    </article>
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
                  <a class="btn azm-social azm-size-36 azm-circle azm-long-shadow azm-facebook" href="#"><i class="fab fa-facebook"></i></a>
                  <a class="btn azm-social azm-size-36 azm-circle azm-long-shadow azm-twitter" href="#"><i class="fab fa-twitter"></i></a>
                  <a class="btn azm-social azm-size-36 azm-circle azm-long-shadow azm-instagram" href="#"><i class="fab fa-instagram"></i></a>
                  <a class="btn azm-social azm-size-36 azm-circle azm-long-shadow azm-youtube-play" href="#"><i class="fab fa-youtube"></i></a>
              </div>
            </div>
            <div class="sb-div">
              <h3>Visita</h3>
              <a target="_blank" rel="noopener noreferrer" href="http://forumradio.cl/">
                <img class="img-fluid" src="img/logo-radio.png" alt="Ingresa a Radio Forum">
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
