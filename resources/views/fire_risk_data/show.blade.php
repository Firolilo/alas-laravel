@extends('layouts.app')

@section('title', 'Detalles del Fire Risk Data')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-fire mr-2"></i>Detalles del Registro
        </h3>
        <div class="card-tools">
            <a href="{{ route('fire_risk_data.edit', $item) }}" class="btn btn-warning">
                <i class="fas fa-edit mr-1"></i>Editar
            </a>
            <form action="{{ route('fire_risk_data.destroy', $item) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar este registro?')">
                    <i class="fas fa-trash mr-1"></i>Eliminar
                </button>
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-clock"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Timestamp</span>
                        <span class="info-box-number">{{ $item->timestamp }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-map-marker-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Location</span>
                        <span class="info-box-number">{{ $item->location }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="fas fa-hourglass-half"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Duration</span>
                        <span class="info-box-number">{{ $item->duration }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Volunteers</span>
                        <span class="info-box-number">{{ $item->volunteers }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="fas fa-fire"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Fire Risk</span>
                        <span class="info-box-number">{{ $item->fire_risk }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-{{ $item->fire_detected ? 'danger' : 'success' }}">
                        <i class="fas fa-fire-extinguisher"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Fire Detected</span>
                        <span class="info-box-number">{{ $item->fire_detected ? 'Yes' : 'No' }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-map-pin"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Coordinates</span>
                        <span class="info-box-number">{{ optional($item->coordinate)->lat }}, {{ optional($item->coordinate)->lng }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <a href="{{ route('fire_risk_data.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left mr-1"></i>Volver
                </a>
            </div>
        </div>
    </div>
</div>
@endsection