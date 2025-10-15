@extends('layouts.app')

@section('title', 'Gestión de Usuarios')

@section('content')
<!-- Contenedor principal con fondo uniforme y sin margen izquierdo -->
<div class="content-wrapper" style="min-height: calc(100vh - 120px); background-color: #f4f6f9; padding: 0 0 2rem 0; margin: 0;">

    <!-- Encabezado + buscador -->
    <div class="card card-outline card-primary mb-3">
        <div class="card-header text-center">
            <h3 class="card-title mb-0"><i class="fas fa-users mr-2"></i>Gestión de Usuarios</h3>
        </div>
        <div class="card-body">
            <div class="input-group" style="max-width: 900px; margin: 0 auto;">
                <input type="text" class="form-control" placeholder="Buscar por nombre, apellido o CI..." aria-label="Buscar usuarios">
                <div class="input-group-append">
                    <button class="btn btn-default" type="button">Limpiar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Tarjetas de estado -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <span class="badge badge-success mr-2" style="width: 12px; height: 12px; border-radius: 50%;"></span>
                        <h3 class="card-title mb-0">Activos (2)</h3>
                    </div>
                    <div class="card-body">
                        <div class="border-top mb-3" style="border-color:#28a745 !important"></div>
                        <div class="card bg-light mb-3">
                            <div class="card-body">
                                <strong class="d-block">Bruno Fiorilo</strong>
                                <div class="text-muted small">CI: 12418043</div>
                                <div class="text-muted small mb-2">Estado: Activo</div>
                                <button class="btn btn-sm btn-default">Eliminar</button>
                            </div>
                        </div>
                        <div class="card bg-light mb-0">
                            <div class="card-body">
                                <strong class="d-block">María Pérez</strong>
                                <div class="text-muted small">CI: 7845123</div>
                                <div class="text-muted small mb-2">Estado: Activo</div>
                                <button class="btn btn-sm btn-default">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <span class="badge badge-warning mr-2" style="width: 12px; height: 12px; border-radius: 50%;"></span>
                        <h3 class="card-title mb-0">Pendientes (1)</h3>
                    </div>
                    <div class="card-body">
                        <div class="border-top mb-3" style="border-color:#fd7e14 !important"></div>
                        <div class="card bg-light mb-0">
                            <div class="card-body">
                                <strong class="d-block">Carlos Gómez</strong>
                                <div class="text-muted small">CI: 9988776</div>
                                <div class="text-muted small">Estado: Pendiente</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <span class="badge badge-danger mr-2" style="width: 12px; height: 12px; border-radius: 50%;"></span>
                        <h3 class="card-title mb-0">Inactivos (1)</h3>
                    </div>
                    <div class="card-body">
                        <div class="border-top mb-3" style="border-color:#dc3545 !important"></div>
                        <div class="card bg-light mb-0">
                            <div class="card-body">
                                <strong class="d-block">Lucía Rojas</strong>
                                <div class="text-muted small">CI: 5566778</div>
                                <div class="text-muted small">Estado: Inactivo</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección admins -->
    <div class="container-fluid">
        <div class="card card-outline card-info mt-2">
            <div class="card-header">
                <h3 class="card-title mb-0"><i class="fas fa-shield-alt mr-2"></i>Admins (1)</h3>
            </div>
            <div class="card-body">
                <div class="card mb-0">
                    <div class="card-body">
                        <strong>ADMIN SISTEMA</strong>
                        <div class="text-muted small">CI: 0000000</div>
                        <div class="text-muted small">Estado: Activo</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Botón agregar usuario -->
    <div class="container-fluid">
        <div class="text-center mt-3 mb-4">
            <a href="{{ route('users.create') }}" class="btn btn-dark"><i class="fas fa-plus mr-1"></i> Añadir nuevo usuario</a>  
        </div>
    </div>

</div>
@endsection
