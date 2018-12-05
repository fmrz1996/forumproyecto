<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/all.css">
    <link rel="stylesheet" href="../../css/slick.css">
    <link rel="stylesheet" href="../../css/style.css">

    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">

    <!-- Servicios de Google -->
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-7301389415014295",
        enable_page_level_ads: true
      });
    </script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130037294-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-130037294-1');
    </script>

    @yield('header')
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
                  <a href="../{{ str_slug($category) }}">{{ $category }}</a>
                </li>
              @endforeach
            </ul>
          </li>
          <li>
            <a target="_blank" rel="noopener noreferrer" href="https://issuu.com/revistaforum">Ediciones anteriores</a>
          </li>
          <li>
            <a target="_blank" rel="noopener noreferrer" href="http://forumradio.cl/">Radio Forum</a>
          </li>
        </ul>
        <form class="search-form" action="/busqueda" method="get">
          <div class="search-menu">
            <i class="fas fa-search"></i>
              <input type="text" name="q" class="search-input" placeholder="Buscar">
              <button id="btnSearchMenu" type="submit" class="btn-search"></button>
          </div>
        </form>
        <div class="rrss-menu">
          <a href="https://www.facebook.com/RevistaForum/" target="_blank" rel="noopener noreferrer" class="btn azm-social azm-size-36 azm-r-square azm-facebook"><i class="fab fa-facebook"></i></a>
          <a href="#" target="_blank" rel="noopener noreferrer" class="btn azm-social azm-size-36 azm-r-square azm-twitter"><i class="fab fa-twitter"></i></a>
          <a href="#" target="_blank" rel="noopener noreferrer" class="btn azm-social azm-size-36 azm-r-square azm-instagram"><i class="fab fa-instagram"></i></a>
          <a href="#" target="_blank" rel="noopener noreferrer" class="btn azm-social azm-size-36 azm-r-square azm-youtube-play"><i class="fab fa-youtube"></i></a>
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
              <a class="nav-link font-weight-bold color-link" href="/politica">POLITICA</a>
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
    @yield('carousel')
    @yield('content')
    @yield('sidebar')
    <!-- Footer -->
    <footer class="footer">
      <div class="container">
              <ul class="nav justify-content-center">
                <li class="nav-item">
                  <a class="nav-link" href="/quienes-somos/">Quiénes somos</a>
                </li>
                {{-- <li class="nav-item">
                  <a class="nav-link" href="/terminos-y-condiciones/">Terminos</a>
                </li> --}}
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
    <script src="../../js/slick.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function () {
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
