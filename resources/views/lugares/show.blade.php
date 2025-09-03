@extends('layouts.app')

@section('title', 'Detalles del Lugar')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-map-marker-alt mr-2"></i>Detalles del Lugar
        </h3>
        <div class="card-tools">
            <a href="{{ route('lugares.edit', $lugar) }}" class="btn btn-warning">
                <i class="fas fa-edit mr-1"></i>Editar
            </a>
            <form action="{{ route('lugares.destroy', $lugar) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar este lugar?')">
                    <i class="fas fa-trash mr-1"></i>Eliminar
                </button>
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-map-pin"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Nombre del Lugar</span>
                        <span class="info-box-number">{{ $lugar->nombre_lugar }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-map-marker-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Ubicación</span>
                        <span class="info-box-number">{{ $lugar->ubicacion ?? 'No especificada' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="fas fa-tag"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tipo de Lugar</span>
                        <span class="info-box-number">{{ $lugar->tipo_lugar }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="fas fa-info-circle"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Descripción</span>
                        <span class="info-box-number">{{ $lugar->descripcion ?? 'Sin descripción' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <a href="{{ route('lugares.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left mr-1"></i>Volver
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
