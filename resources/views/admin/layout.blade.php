<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Panel de administración - Forum</title>

    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/all.css">
    <link rel="stylesheet" href="../../../css/adminpanel/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../../../css/adminpanel/sb-admin.css">
    @yield('stylesheet')

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="/admin">Panel de administración</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('usuarios.mostrar', ['id' => Auth::user()->id]) }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->username }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('usuarios.mostrar', ['id' => Auth::user()->id]) }}">{{ __('Mi perfil') }}</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Cerrar sesión') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item @if(route('admin') == Request::url()) active @endif">
          <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Inicio</span>
          </a>
        </li>
        <li class="nav-item dropdown @if(str_contains(request()->url(), '/admin/posts')) active @endif">
          <a id="pagesDropdown_post" class="nav-link dropdown-toggle" href="/admin/posts"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-file-alt"></i>
            <span>Posts</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown_post">
            <a class="dropdown-item" href="{{ route('posts.nuevo') }}">
              <i class="fas fa-plus"></i> Crear post
            </a>
            <a class="dropdown-item" href="{{ route('posts') }}">
              <i class="fas fa-list"></i> Listar posts
            </a>
          </div>
        </li>
        <li class="nav-item dropdown @if(str_contains(request()->url(), '/admin/categorias')) active @endif">
          <a id="pagesDropdown_cat"class="nav-link dropdown-toggle" href="/admin/categorias" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-archive"></i>
            <span>Categorías</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown_cat">
            @if(Auth::user()->hasAnyRole(['Director ejecutivo', 'Administrador']))
            <a class="dropdown-item" href="{{ route('categorias.nuevo') }}">
              <i class="fas fa-plus"></i> Crear categoría
            </a>
            @endif
            <a class="dropdown-item" href="{{ route('categorias') }}">
              <i class="fas fa-list"></i> Listar categorías
            </a>
          </div>
        </li>
        <li class="nav-item dropdown @if(str_contains(request()->url(), '/admin/tags')) active @endif">
          <a id="pagesDropdown_cat"class="nav-link dropdown-toggle" href="/admin/tags" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-tags"></i></i>
            <span>Tags</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown_cat">
            <a class="dropdown-item" href="{{ route('tags.nuevo') }}">
              <i class="fas fa-plus"></i> Crear tag(s)
            </a>
            <a class="dropdown-item" href="{{ route('tags') }}">
              <i class="fas fa-list"></i> Listar tags
            </a>
          </div>
        </li>
          <li class="nav-item dropdown @if(str_contains(request()->url(), '/admin/usuarios')) active @endif">
            <a id="pagesDropdown_user" class="nav-link dropdown-toggle" href="/admin/usuarios" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-users"></i>
              <span>Usuarios</span></a>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown_user">
            @if(Auth::user()->hasAnyRole(['Director ejecutivo', 'Administrador']))
              <a class="dropdown-item" href="{{ route('usuarios.nuevo') }}">
                <i class="fas fa-user-plus"></i> Crear usuario
              </a>
            @endif
              <a class="dropdown-item" href="{{ route('usuarios') }}">
                <i class="fas fa-address-book"></i> Listar usuarios
              </a>
            </div>
          </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">
          @yield('content')
        </div>

        {{-- Footer --}}
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Forum Comunicaciones 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <script src="../../../js/jquery-3.3.1.min.js"></script>
    <script src="../../../js/popper.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../../../js/adminpanel/jquery.easing.min.js"></script>
    <script src="../../../js/adminpanel/sb-admin.min.js"></script>
    @yield('script')

  </body>

</html>
