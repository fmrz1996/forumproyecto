<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/slick.css">
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
                  <a href="/actualidad">Actualidad</a>
              </li>
              <li>
                  <a href="/sociedad">Sociedad</a>
              </li>
              <li>
                  <a href="/cultura">Cultura</a>
              </li>
              <li>
                  <a href="/tecnologia">Tecnología</a>
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
            <a href="/">
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
              <a class="nav-link font-weight-bold color-link" href="/actualidad">ACTUALIDAD</a>
            </li>
            <li class="nav-item">
              <a class="nav-link font-weight-bold color-link" href="/sociedad">SOCIEDAD</a>
            </li>
            <li class="nav-item">
              <a class="nav-link font-weight-bold color-link" href="/cultura">CULTURA</a>
            </li>
            <li class="nav-item">
              <a class="nav-link font-weight-bold color-link" href="/tecnologia">TECNOLOGIA</a>
            </li>
          </ul>
        </nav>
      </div>
    <!-- Cuerpo de Página -->
    <div id="main" class="container contact-form">
      <form method="post">
        <h1>Contacto</h1>
        <div class="row">
          <div class="col-sm-12 col-md-6 contact-form-container">
            <h3>¿Cómo te podemos ayudar?</h3>
            <div class="form-group">
              <input class="form-control" type="text" name="txtName" placeholder="Nombre" value="">
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="txtEmail" placeholder="Correo electrónico" value="">
            </div>
            <div class="form-group">
              <textarea class="form-control" name="txtMessage" rows="8" cols="80" placeholder="Tu mensaje..."></textarea>
            </div>
            <div class="form-group">
              <input class="contact-btn" type="submit" name="btnSubmit" value="Enviar Mensaje">
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="contact-social">
              <div class="social-div">
                <h3>Se parte de la comunidad Forum</h3>
                <div class="sb-rrss">
                  <a class="btn azm-social azm-size-48 azm-circle azm-long-shadow azm-facebook" href="#"><i class="fab fa-facebook"></i></a>
                  <a class="btn azm-social azm-size-48 azm-circle azm-long-shadow azm-twitter" href="#"><i class="fab fa-twitter"></i></a>
                  <a class="btn azm-social azm-size-48 azm-circle azm-long-shadow azm-instagram" href="#"><i class="fab fa-instagram"></i></a>
                  <a class="btn azm-social azm-size-48 azm-circle azm-long-shadow azm-youtube-play" href="#"><i class="fab fa-youtube"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    {{-- Footer --}}
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
                  <a class="nav-link" href="/contacto">Contactanos</a>
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
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/slick.min.js"></script>

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
