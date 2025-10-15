@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <!-- Columna izquierda: Mapa dentro de una tarjeta -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Mapa</h3>
            </div>
            <div class="card-body p-2">
                <!-- Contenedor de mapa: Leaflet renderiza aquí -->
                <div id="dashboard-map" class="w-100" style="height: 480px; border-radius: .25rem;"></div>
            </div>
        </div>
    </div>

    <!-- Columna derecha: Panel de Áreas de Biomasa -->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Áreas de Biomasa (2)</h3>
            </div>
            <div class="card-body">
                <!-- Buscador -->
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Buscar..." aria-label="Buscar áreas de biomasa">
                    <div class="input-group-append">
                        <button class="btn btn-default" type="button" aria-label="Ejecutar búsqueda"><i class="fas fa-search"></i></button>
                    </div>
                </div>

                <!-- Filtros -->
                <div class="form-row">
                    <div class="form-group col-6">
                        <label class="sr-only" for="filtro-tipo">Tipo</label>
                        <select id="filtro-tipo" class="custom-select" aria-label="Filtrar por tipo">
                            <option selected>Tipo</option>
                            <option>Sabana</option>
                            <option>Humedal</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label class="sr-only" for="filtro-estado">Estado</label>
                        <select id="filtro-estado" class="custom-select" aria-label="Filtrar por estado">
                            <option selected>Todos</option>
                            <option>Bueno</option>
                            <option>Degradado</option>
                        </select>
                    </div>
                    <div class="form-group col-12">
                        <label class="sr-only" for="filtro-densidad">Densidad</label>
                        <select id="filtro-densidad" class="custom-select" aria-label="Filtrar por densidad">
                            <option selected>Cualq. densidad</option>
                            <option>Alta</option>
                            <option>Media</option>
                            <option>Baja</option>
                        </select>
                    </div>
                </div>

                <!-- Lista de áreas -->
                <div class="mt-2">
                    <div class="d-flex align-items-start justify-content-between pb-3 mb-3 border-bottom">
                        <div>
                            <h6 class="mb-1 font-weight-bold">Sabana</h6>
                            <div class="text-muted small">Área: 4599.08 km<sup>2</sup></div>
                            <div class="text-muted small">Densidad: <span class="badge badge-warning">Media</span></div>
                        </div>
                        <div class="text-right">
                            <div class="text-muted small mb-1">10/10/2025</div>
                            <span class="badge badge-danger">Degradado</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-start justify-content-between">
                        <div>
                            <h6 class="mb-1 font-weight-bold">Humedal</h6>
                            <div class="text-muted small">Área: 887.55 km<sup>2</sup></div>
                            <div class="text-muted small">Densidad: <span class="badge badge-success">Alta</span></div>
                        </div>
                        <div class="text-right">
                            <div class="text-muted small mb-1">10/10/2025</div>
                            <span class="badge badge-info">Bueno</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Indicadores (small boxes de AdminLTE) -->
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-teal">
            <div class="inner">
                <h3>31.2<sup style="font-size: 20px">°C</sup></h3>
                <p>Temperatura Actual</p>
            </div>
            <div class="icon"><i class="fas fa-temperature-high"></i></div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>81<sup style="font-size: 20px">%</sup></h3>
                <p>Humedad</p>
            </div>
            <div class="icon"><i class="fas fa-water"></i></div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>0 <sup style="font-size: 20px">mm</sup></h3>
                <p>Precipitación</p>
            </div>
            <div class="icon"><i class="fas fa-cloud-rain"></i></div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>0</h3>
                <p>Puntos de calor</p>
            </div>
            <div class="icon"><i class="fas fa-fire"></i></div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>2</h3>
                <p>Áreas de biomasa</p>
            </div>
            <div class="icon"><i class="fas fa-leaf"></i></div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Evitar inicializar dos veces
        if (window.__DASHBOARD_MAP__) return;
        const container = document.getElementById('dashboard-map');
        if (!container || !window.L) return;

        // Inicialización Leaflet simple siguiendo el ejemplo de AdminLTE
        const map = L.map('dashboard-map', { zoomControl: true });
        const center = [-17.7833, -63.1833]; // Santa Cruz de la Sierra aprox.
        map.setView(center, 6);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Marcador de referencia
        L.marker(center).addTo(map);

        window.__DASHBOARD_MAP__ = map;
    });
    // Ajuste por si el mapa está dentro de tabs/oculto
    window.addEventListener('resize', function() {
        if (window.__DASHBOARD_MAP__) {
            window.__DASHBOARD_MAP__.invalidateSize();
        }
    });
</script>
@endpush
@endsection


