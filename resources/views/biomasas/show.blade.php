@extends('layouts.app')

@section('title', 'Detalles de la Biomasa')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-leaf mr-2"></i>Detalles de la Biomasa
        </h3>
        <div class="card-tools">
            <a href="{{ route('biomasas.edit', $biomasa) }}" class="btn btn-warning">
                <i class="fas fa-edit mr-1"></i>Editar
            </a>
            <form action="{{ route('biomasas.destroy', $biomasa) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar esta biomasa?')">
                    <i class="fas fa-trash mr-1"></i>Eliminar
                </button>
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-seedling"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tipo de Biomasa</span>
                        <span class="info-box-number">{{ $biomasa->tipo_biomasa }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="fas fa-fire"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Poder Calorífico</span>
                        <span class="info-box-number">{{ $biomasa->poder_calorifico }} MJ/kg</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-{{ $biomasa->densidad == 'Alta' ? 'danger' : ($biomasa->densidad == 'Media' ? 'warning' : 'success') }}">
                        <i class="fas fa-weight"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Densidad</span>
                        <span class="info-box-number">{{ $biomasa->densidad }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-{{ $biomasa->degradacion == 'Alta' ? 'danger' : ($biomasa->degradacion == 'Media' ? 'warning' : 'success') }}">
                        <i class="fas fa-chart-line"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Degradación</span>
                        <span class="info-box-number">{{ $biomasa->degradacion }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="fas fa-info-circle"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Descripción</span>
                        <span class="info-box-number">{{ $biomasa->descripcion ?? 'Sin descripción' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <a href="{{ route('biomasas.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left mr-1"></i>Volver
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
