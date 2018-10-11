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

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="/admin">Panel de administración</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Buscar..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
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
            <a class="dropdown-item" href="{{ route('categorias.nuevo') }}">
              <i class="fas fa-plus"></i> Crear categoría
            </a>
            <a class="dropdown-item" href="{{ route('categorias') }}">
              <i class="fas fa-list"></i> Listar categorías
            </a>
          </div>
        </li>
        <li class="nav-item dropdown @if(str_contains(request()->url(), '/admin/usuarios')) active @endif">
          <a id="pagesDropdown_user" class="nav-link dropdown-toggle" href="/admin/usuarios" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-users"></i>
            <span>Usuarios</span></a>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown_user">
            <a class="dropdown-item" href="{{ route('usuarios.nuevo') }}">
              <i class="fas fa-user-plus"></i> Crear usuario
            </a>
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
