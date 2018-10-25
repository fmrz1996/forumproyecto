<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/all.css">
    <link rel="stylesheet" href="../../css/slick.css">
    <link rel="stylesheet" href="../../css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <title>@yield('title')</title>
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
            @foreach ($categorias as $category)
              <li>
                <a href="{{ str_slug($category) }}">{{ $category }}</a>
              </li>
            @endforeach
          </ul>
        </li>
        <li>
          <a href="#">Novedades</a>
        </li>
        <li>
          <a href="#">Ediciones anteriores</a>
        </li>
        <li>
          <a target="_blank" rel="noopener noreferrer" href="http://forumradio.cl/">Radio Forum</a>
        </li>
      </ul>
      <form class="search-form" action="index.html" method="get">
      <div class="search-menu">
        <i class="fas fa-search"></i>
          <input type="text" class="search-input" placeholder="Buscar">
          <button id="btnSearchMenu" type="submit" class="btn-search"></button>
      </div>
    </form>
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
              <img src="../../img/forum_logo.png" class="img-fluid logo" alt="Revista Forum">
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
              <img src="../../img/forum_logo_fixed.png" class="img-fluid logo" alt="Revista Forum">
            </a>
          </div>
          <div class="col-3 col-header">

          </div>
        </div>
      </div>
    </header>
    <!-- Carousel -->
    @yield('carousel')
    <!-- Cuerpo de Página -->
    @yield('content')
    {{-- Footer --}}
    <footer class="footer">
      <div class="container">
              <ul class="nav justify-content-center">
                <li class="nav-item">
                  <a class="nav-link" href="/quienes-somos/">Quiénes somos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/publicita-con-nosotros/">Publicita con nosotros</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/terminos-y-condiciones/">Terminos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/contacto/">Contactanos</a>
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
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../../js/slick.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function () {
          $("#side-menu").mCustomScrollbar({
              theme: "minimal",
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

    @yield('script')
  </body>
</html>
