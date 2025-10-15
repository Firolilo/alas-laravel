@extends('layouts.app')

@section('title', 'Guía rápida')

@section('content')
<div class="row">
    <div class="col-lg-8 col-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Guía rápida de uso</h3>
            </div>
            <div class="card-body">
                <p class="text-muted">Esta guía resume cómo navegar y utilizar la aplicación (maquetación).</p>
                <ol class="mb-0">
                    <li class="mb-2"><strong>Dashboard</strong>: visión general, indicadores y accesos rápidos.</li>
                    <li class="mb-2"><strong>Datos</strong>: revisa métricas y gráficos. Usa el área interactiva para ver cambios en tiempo real.</li>
                    <li class="mb-2"><strong>Simulación</strong>: inicia, limpia o carga una simulación. Ajusta parámetros en las tarjetas inferiores.</li>
                    <li class="mb-2"><strong>Reporte de Biomasa</strong>: crea reportes y delimita áreas en el mapa.</li>
                    <li class="mb-2"><strong>Usuarios</strong>: gestiona usuarios por estado y rol.</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-12">
        <div class="card card-outline card-secondary">
            <div class="card-header">
                <h3 class="card-title">Atajos útiles</h3>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><i class="fas fa-play text-success mr-2"></i><a href="{{ route('simulacion.index') }}">Iniciar simulación</a></li>
                    <li class="mb-2"><i class="fas fa-chart-area text-primary mr-2"></i><a href="{{ route('datos.index') }}">Ver datos</a></li>
                    <li class="mb-2"><i class="fas fa-leaf text-teal mr-2"></i><a href="{{ route('biomasas.create') }}">Nuevo reporte de biomasa</a></li>
                    <li class="mb-2"><i class="fas fa-user-plus text-dark mr-2"></i><a href="{{ route('users.create') }}">Añadir usuario</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection


