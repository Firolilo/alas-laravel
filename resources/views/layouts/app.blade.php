<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE App</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
    <!-- Leaflet (AdminLTE examples) -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar: barra superior estilo AdminLTE v3 (solo maquetación) -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-maroon">
        <!-- Bloque izquierdo: toggler + marca + navegación principal -->
        <ul class="navbar-nav">
            <!-- Botón para mostrar/ocultar el sidebar -->
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button" aria-label="Abrir menú lateral"><i class="fas fa-bars"></i></a>
            </li>
            
            <!-- Ítems de navegación principales -->
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ url('/') }}" class="nav-link active" aria-current="page">Inicio</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('datos.index') }}" class="nav-link">Datos</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('simulacion.index') }}" class="nav-link" aria-label="Simulación">Simulación</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('biomasas.create') }}" class="nav-link" aria-label="Reporte">Reporte</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('users.index') }}" class="nav-link">Usuarios</a>
            </li>
        </ul>

        <!-- Bloque derecho: información de usuario + acción de sesión -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-none d-sm-inline-block">
                <span class="nav-link font-weight-bold text-uppercase" aria-label="Rol del usuario">ADMIN</span>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('login.index') }}" class="nav-link" tabindex="0" aria-label="Cerrar sesión">Cerrar sesión</a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link">
            <img src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">SIPII</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- SidebarSearch Form -->
            <div class="form-inline mt-2">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Buscar">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-3">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">ATAJOS</li>
                    <li class="nav-item"><a href="{{ route('biomasas.create') }}" class="nav-link"><i class="nav-icon fas fa-plus"></i><p>Nuevo reporte biomasa</p></a></li>
                    <li class="nav-item"><a href="{{ route('simulacion.index') }}" class="nav-link"><i class="nav-icon fas fa-play"></i><p>Nueva simulación</p></a></li>
                    <li class="nav-item"><a href="{{ route('users.create') }}" class="nav-link"><i class="nav-icon fas fa-user-plus"></i><p>Añadir usuario</p></a></li>

                    <li class="nav-header">AYUDA</li>
                    <li class="nav-item"><a href="{{ route('guia.index') }}" class="nav-link"><i class="nav-icon fas fa-question-circle"></i><p>Guía rápida</p></a></li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">@yield('title', 'Dashboard')</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <strong>Copyright &copy; 2025.</strong>
        Todos los derechos reservados.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
        </div>
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- AdminLTE App -->
<script>
    $(document).ready(function() {
        // Inicializar Select2
        $('.select2').select2({
            theme: 'bootstrap4',
            width: '100%'
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>
<!-- Leaflet -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
@stack('scripts')
</body>
</html>