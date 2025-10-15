@extends('layouts.app')

@section('title', 'Simulador Avanzado de Incendios')

@section('content')
<!-- Controles superiores y KPIs -->
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-maroon mb-3">
            <div class="card-body">
                <!-- Botones de control (centrados con btn-toolbar de AdminLTE/Bootstrap) -->
                <div class="btn-toolbar justify-content-center flex-wrap w-100 mb-2" role="toolbar" aria-label="Acciones de simulación">
                    <div class="btn-group mb-2" role="group" aria-label="Grupo principal">
                        <button type="button" class="btn btn-success btn-sm rounded-pill px-3"><i class="fas fa-play mr-1"></i> Iniciar Simulación</button>
                        <button type="button" class="btn btn-light btn-sm rounded-pill px-3"><i class="fas fa-broom mr-1"></i> Limpiar Todo</button>
                        <button type="button" class="btn btn-info btn-sm rounded-pill px-3"><i class="fas fa-upload mr-1"></i> Cargar Simulación</button>
                        <button type="button" class="btn btn-outline-secondary btn-sm rounded-pill px-3"><i class="fas fa-history mr-1"></i> Ver Historial</button>
                    </div>
                </div>

                <!-- KPIs con info-box de AdminLTE -->
                <div class="row mt-3">
                    <div class="col-sm-4 col-12 mb-2">
                        <div class="info-box">
                            <span class="info-box-icon bg-maroon elevation-1"><i class="fas fa-clock"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Tiempo</span>
                                <span class="info-box-number">0h</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12 mb-2">
                        <div class="info-box">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-fire"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Fuegos activos</span>
                                <span class="info-box-number">0/50</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12 mb-2">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-people-carry"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Voluntarios necesarios</span>
                                <span class="info-box-number">0</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Plan de Mitigación -->
                <div class="mt-3">
                    <h6 class="mb-2">Plan de Mitigación</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><i class="fas fa-cloud-sun text-info mr-2"></i> <a href="#" class="text-body">Estrategias Climáticas</a></li>
                        <li class="mb-2"><i class="fas fa-user-friends text-danger mr-2"></i> <a href="#" class="text-body">Estrategias Voluntarias</a></li>
                        <li class="mt-2"><i class="fas fa-user-check text-maroon mr-2"></i> <span class="text-muted">Total Voluntarios Requeridos:</span> <span class="text-maroon font-weight-bold">0</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mapa -->
<div class="row">
    <div class="col-12">
        <div class="card mb-3">
            <div class="card-body p-2">
                <div id="sim-map" style="height: 420px; border-radius: .25rem;"></div>
            </div>
        </div>
    </div>
</div>

<!-- Controles inferiores -->
<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
        <div class="card card-outline card-secondary mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-muted">Dirección Viento</span>
                    <span class="badge badge-light border"><i class="fas fa-arrow-up mr-1"></i>Norte</span>
                </div>
                <input type="range" class="custom-range" min="0" max="360" value="0" aria-label="Dirección del viento">
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="card card-outline card-secondary mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-muted">Velocidad Viento (km/h)</span>
                    <span class="badge badge-light border">10</span>
                </div>
                <input type="range" class="custom-range" min="0" max="100" value="10" aria-label="Velocidad del viento">
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="card card-outline card-secondary mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-muted">Temperatura (°C)</span>
                    <span class="badge badge-light border">25</span>
                </div>
                <input type="range" class="custom-range" min="-10" max="50" value="25" aria-label="Temperatura">
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="card card-outline card-secondary mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-muted">Humedad (%)</span>
                    <span class="badge badge-light border">50</span>
                </div>
                <input type="range" class="custom-range" min="0" max="100" value="50" aria-label="Humedad">
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="card card-outline card-secondary mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-muted">Velocidad Simulación</span>
                    <span class="badge badge-light border">1</span>
                </div>
                <input type="range" class="custom-range" min="1" max="5" value="1" aria-label="Velocidad de simulación">
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="card card-outline card-warning mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-muted">Riesgo de Incendio</span>
                    <span class="badge badge-warning">50%</span>
                </div>
                <div class="progress progress-xxs">
                    <div class="progress-bar bg-warning" style="width: 50%"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (!window.L) return;
        var map = L.map('sim-map');
        var center = [-17.7833, -63.1833];
        map.setView(center, 6);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);
    });
</script>
@endpush
@endsection

