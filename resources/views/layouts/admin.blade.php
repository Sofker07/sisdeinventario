<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
  <title>Sistema de Inventarios</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- Iconos de bootstrap-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  {{-- sweetalert2 --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!--JQuery-->
  <script src="{{asset('/plugins/jquery/jquery.js')}}"></script>
  <!--Datatables-->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css?v=3.2.0')}}">

  <!-- estilos propios -->
  @yield('estilos')
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('index')}}" class="nav-link">Sistema de Inventario</a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{route('index')}}" class="brand-link">
        <img src="{{ url('/dist/img/IneLogo1.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Sistema de Inventario</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ url('dist/img/IneLogo2.jpg') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="{{route('index')}}" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @can('usuarios')
              <li class="nav-item">
                <a href="#" class="nav-link active" style="background-color: #DB0F7B; color: white;">
                  <i class="nav-icon">
                    <i class="bi bi-person-check"></i>
                  </i>
                  <p>
                    Usuarios
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('usuarios/create')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Nuevo Usuario</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('usuarios')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Listado de Usuarios</p>
                    </a>
                  </li>
                </ul>
              </li>
            @endcan
            <li class="nav-item">
              <a href="{{url('database')}}" class="nav-link active" style="background-color: #DB0F7B; color: white;">
                <i class="nav-icon">
                  <i class="bi bi-database-add"></i>
                </i>
                <p>
                  Importar base de datos
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('inventario')}}" class="nav-link active" style="background-color: #DB0F7B; color: white;">
                <i class="nav-icon">
                  <i class="bi bi-clipboard-data"></i>
                </i>
                <p>
                  Comenzar inventario
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('reportes')}}" class="nav-link active" style="background-color: #DB0F7B; color: white;">
                <i class="nav-icon">
                  <i class="bi bi-file-earmark-text"></i>
                </i>
                <p>
                  Generar reportes
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" style="background-color: #3C3C3C">
                <i class="nav-icon">
                  <i class="bi bi-door-closed" style="color: red"></i>
                </i>
                <p>Cerrar Sesión</p>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <br>
      <div class="content">
        @yield('content')
      </div>

    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content go es here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        De parte de su amigo Néstor
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2024 <a href="https://www.oplever.org.mx/" target="_blank">Organismo Público Local Electoral de Veracruz</a>.</strong> Todos los derechos reservados.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!--File Input-->
  <script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
  <!--Datatables-->
  <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
  <script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
  <script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
  <script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
  <!-- Charts -->
  <script src="{{('plugins/chart.js/Chart.min.js')}}"></script>
  <!-- Código JS de cada blade -->
  @stack('códigoJS')
  
</body>
</html>