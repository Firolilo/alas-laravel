<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE App</title>

    <!-- AdminLTE 4 via CDN (Bootstrap 5 + AdminLTE) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-rc4/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Mi App</a>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Usuarios</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('fire_risk_data.index') }}">FireRiskData</a></li>
            </ul>
        </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content p-3">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-end d-none d-sm-inline">AdminLTE 4</div>
        <strong>Proyecto</strong>
    </footer>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-rc4/dist/js/adminlte.min.js"></script>
</body>
</html>