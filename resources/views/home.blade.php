<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Forum Comunidad</title>
  </head>
  <body>
    <div class="overlay"></div>
    <div class="wrapper">
    <!-- Menú lateral -->
    <nav id="side-menu">
      <div id="btn-dismiss" class="text-center">
        <i class="fas fa-arrow-left"></i>
      </div>
      <ul class="list-menu components">
        <li class="active">
          <a href="#seccions-menu" data-toggle="collapse" aria-expanded="false">Secciones</a>
          <ul class="collapse show list-unstyled" id="seccions-menu">
              <li>
                  <a href="#">Actualidad</a>
              </li>
              <li>
                  <a href="#">Sociedad</a>
              </li>
              <li>
                  <a href="#">Cultura</a>
              </li>
              <li>
                  <a href="#">Tecnología</a>
              </li>
          </ul>
        </li>
        <li>
          <a href="#">Novedades</a>
        </li>
        <li>
          <a href="#">Ediciones anteriores</a>
        </li>
        <li>
          <a href="#">Radio Forum</a>
        </li>
      </ul>
      <div class="search-menu">
        <i class="fas fa-search"></i>
        <form class="search-form" action="index.html" method="get">
          <input type="text" class="search-input" placeholder="Buscar">
          <button id="btnSearchMenu" type="submit" class="btn-search"></button>
        </form>
      </div>
      <div class="rrss-menu">
        <a href="#" class="btn azm-social azm-size-36 azm-r-square azm-facebook"><i class="fab fa-facebook"></i></a>
        <a href="#" class="btn azm-social azm-size-36 azm-r-square azm-twitter"><i class="fab fa-twitter"></i></a>
        <a href="#" class="btn azm-social azm-size-36 azm-r-square azm-instagram"><i class="fab fa-instagram"></i></a>
        <a href="#" class="btn azm-social azm-size-36 azm-r-square azm-youtube-play"><i class="fab fa-youtube"></i></a>
      </div>
    </nav>
    <!-- Header -->
    <div class="container-fluid py-3">
      <header class="header">
        <div class="row">
          <div class="col-3">
            <button type="button" id="menuCollapse" class="btn btn-toggle color-link col-header">
              <div class="d-none d-md-flex">Menú</div>
              <i class="fas fa-bars"></i>
            </button>
          </div>
          <div class="col-6 text-center col-header div-logo">
            <a href="#">
              <img src="img/forum_logo.png" class="img-fluid logo" alt="Revista Forum">
            </a>
          </div>
          <div class="col-3 col-header">

          </div>
        </div>
      </header>
    </div>
      <!-- Categorías -->
      <div class="nav-categorias">
        <nav class="navbar navbar-expand-md justify-content-center d-none d-md-flex">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link font-weight-bold color-link" href="#">ACTUALIDAD</a>
            </li>
            <li class="nav-item">
              <a class="nav-link font-weight-bold color-link" href="#">SOCIEDAD</a>
            </li>
            <li class="nav-item">
              <a class="nav-link font-weight-bold color-link" href="#">CULTURA</a>
            </li>
            <li class="nav-item">
              <a class="nav-link font-weight-bold color-link" href="#">TECNOLOGIA</a>
            </li>
          </ul>
        </nav>
      </div>
    <!-- Header fijo -->
    <header id="header-fixed" class="header sticky">
      <div class="container-fluid">
        <div class="row">
          <div class="col-3 col-header">
            <button type="button" id="menuCollapseFixed" class="btn btn-toggle color-link">
              <i class="fas fa-bars"></i>
          </div>
          <div class="col-6 text-center col-header div-logo">
            <a href="/">
              <img src="img/forum_logo_fixed.png" class="img-fluid logo" alt="Revista Forum">
            </a>
          </div>
          <div class="col-3 col-header">

          </div>
        </div>
      </div>
    </header>
    <!-- Carousel -->
    <div class="container-fluid text-center">
      <div class="row">
        <div class="full-width-row">
          <div id="carousel">
            <div style="position: relative;">
              <img class="img-fluid img-slider" src="img/img1.jpg" alt="">
              <div class="slider-post">
                <h3>
                  <a href="#">El primer vestido hecho con telarañas silvestres</a>
                </h3>
              </div>
            </div>
            <div style="position: relative;">
                <img class="img-fluid img-slider" src="img/img2.jpg" alt="">
                <div class="slider-post">
                  <h3>
                    <a href="#">Mirar a los ojos reduciría notablemente el estrés</a>
                  </h3>
                </div>
            </div>
            <div style="position: relative;">
                <img class="img-fluid img-slider" src="img/img3.jpg" alt="">
                <div class="slider-post">
                  <h3>
                    <a href="#">Como vestirse con clase sin ser rico</a>
                  </h3>
                </div>
            </div>
            <div style="position: relative;">
              <img class="img-fluid img-slider" src="img/img4.jpg" alt="">
              <div class="slider-post">
                <h3>
                  <a href="#">No te pierdas lo último de la semana dieciochera</a>
                </h3>
              </div>
            </div>
          </div>
            <aside class="gap">
            </aside>
        </div>
      </div>
    </div>
  <!-- Cuerpo de Página -->
  <div id="main" class="container">
    <div class="row">
    <div id="posts" class="col-sm-12 col-md-8 posts">
      <article>
        <div class="row align-middle">
          <div class="col-sm-12 col-md-6">
            <figure class="opacity">
              <a href="#">
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
                <a class="keyword-post" href="#">#viña </a>
                <a class="titulo-post" href="/noticia">Las 4 nuevas rutas turísticas Valle del Itata</a>
              </h3>
            </header>
            <div class="contenido-post">
              <p>"Viñas y Observación de aves", "Aventura campo y mar", "Alma del Valle" y "Ruta Agroecológica patrimonial" son los nombres de las nuevas rutas disponibles para los turistas en el Valle del Itata con alto valor identitario y patrimonial.</p>
            </div>
          </div>
        </div>
      </article>
      <article>
        <div class="row align-middle">
          <div class="col-sm-12 col-md-6">
            <figure class="opacity">
              <a href="#">
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
              <a class="keyword-post" href="#">#comida </a>
              <a class="titulo-post" href="#">Tecnología para hacer alimentos más saludables</a>
            </h3>
          </header>
          <div class="contenido-post">
            <p>En la actualidad se procesan 3,2 millones de toneladas de aceite al año en el mundo, de las cuales 15 mil toneladas corresponde a  almazaras chilenas.</p>
          </div>
        </div>
      </div>
    </article>
    <article>
      <div class="row align-middle">
        <div class="col-sm-12 col-md-6">
          <figure class="opacity">
            <a href="#">
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
              <a class="keyword-post" href="#">#ñuble </a>
              <a class="titulo-post" href="#">La Región de Ñuble en cuenta regresiva</a>
            </h3>
          </header>
          <div class="contenido-post">
            <p>El anhelo surgió hace dos décadas, el primer estudio formal para sustentar su creación se gestó a comienzos de siglo y la idea de legislar a inicios de la actual década.</p>
          </div>
        </div>
      </div>
    </article>
    <article>
      <div class="row align-middle">
        <div class="col-sm-12 col-md-6">
          <figure class="opacity">
            <a href="#">
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
              <a class="keyword-post" href="#">#cyberday </a>
              <a class="titulo-post" href="#">Tecnologia</a>
            </h3>
          </header>
          <div class="contenido-post">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>
      </div>
    </article>
  </div>
        <div id="sidebar" class="col-sm-12 col-md-4 sidebar">
          <div class="container">
            <div class="sb-div">
              <strong>
                <span>Columnistas</span>
              </strong>
              <ul class="sb-columnistas">
                <li>
                  <h3 class="sb-subtitulo">Benito Pérez</h3>
                  <p class="sb-cuerpo">Quien más agita la denuncia del peligro de invasión que representan los desvalidos del sur, son los ricos del norte, que claman por más fronteras y más identidad...</p>
                </li>
                <li>
                  <h3 class="sb-subtitulo">Enzo Monje</h3>
                  <p class="sb-cuerpo">No es el momento de hacerlo, porque andamos discutiendo cuestiones de género, pero es tan bueno que sería procedente incorporar al castellano...</p>
                </li>
                <li>
                  <h3 class="sb-subtitulo">Sergio Romero</h3>
                  <p class="sb-cuerpo">Su afán está en consonancia con la urgencia del nombre: es tan movilizador que exige la ausencia de otros eslóganes...</p>
                </li>
              </ul>
            </div>
            <div class="sb-div">
              <div class="sb-rrss">
                <h3>Siguenos</h3>
                  <a class="btn azm-social azm-size-48 azm-circle azm-long-shadow azm-facebook" href="#"><i class="fab fa-facebook"></i></a>
                  <a class="btn azm-social azm-size-48 azm-circle azm-long-shadow azm-twitter" href="#"><i class="fab fa-twitter"></i></a>
                  <a class="btn azm-social azm-size-48 azm-circle azm-long-shadow azm-instagram" href="#"><i class="fab fa-instagram"></i></a>
                  <a class="btn azm-social azm-size-48 azm-circle azm-long-shadow azm-youtube-play" href="#"><i class="fab fa-youtube"></i></a>
              </div>
            </div>
            <div class="sb-div">
              <a href="http://forumradio.cl/">
                <img class="img-fluid" src="img/logo-radio.png" alt="Ingresa a Radio Forum">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer">
      <div class="container">
              <ul class="nav justify-content-center">
                <li class="nav-item">
                  <a class="nav-link" href="#">Quiénes somos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Publicita con nosotros</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Terminos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Contactanos</a>
                </li>
              </ul>
          <div class="copy">
            FORUM COMUNICACIONES
            <br>
            © 2018
          </div>
      </div>
    </footer>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
      $('#carousel').slick({
        autoplay: true,
        autoplaySpeed: 5000,
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
    </script>

    <script type="text/javascript">
        $("#header-fixed").hide();
        var headerSlide = document.getElementById("header-fixed");
        var topCarousel = $(".gap").offset().top - 100;

        $(window).scroll(function() {
            if($(window).scrollTop() > topCarousel) {
                $("#header-fixed").show();
                headerSlide.classList.add("slide");
            } else {
              headerSlide.classList.remove("slide");
            }
        });
    </script>

    <script type="text/javascript">
      $(document).ready(function () {
          $("#side-menu").mCustomScrollbar({
              theme: "minimal"
          });

          $('#btn-dismiss, .overlay').on('click', function () {
              $('#side-menu').removeClass('active');
              $('.overlay').removeClass('active');
          });

          $('#menuCollapse, #menuCollapseFixed').on('click', function () {
              $('#side-menu').addClass('active');
              $('.overlay').addClass('active');
              $('.collapse.in').toggleClass('in');
              $('a[aria-expanded=true]').attr('aria-expanded', 'false');
          });
      });
    </script>
  </body>
</html>
