@extends('layouts.app')

@section('title', 'Detalles del Usuario')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-user mr-2"></i>Detalles del Usuario
        </h3>
        <div class="card-tools">
            <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">
                <i class="fas fa-edit mr-1"></i>Editar
            </a>
            <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar este usuario?')">
                    <i class="fas fa-trash mr-1"></i>Eliminar
                </button>
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-user"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Nombre</span>
                        <span class="info-box-number">{{ $user->nombre }} {{ $user->apellido }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-envelope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Email</span>
                        <span class="info-box-number">{{ $user->email }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="fas fa-id-card"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">CI</span>
                        <span class="info-box-number">{{ $user->ci }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="fas fa-phone"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Teléfono</span>
                        <span class="info-box-number">{{ $user->telefono ?? 'No especificado' }}</span>
                    </div>
                </div>
            </div>
        </div>

        @if($user->entidad_perteneciente || $user->state)
        <div class="row">
            @if($user->entidad_perteneciente)
            <div class="col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-building"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Entidad</span>
                        <span class="info-box-number">{{ $user->entidad_perteneciente }}</span>
                    </div>
                </div>
            </div>
            @endif
            @if($user->state)
            <div class="col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-{{ $user->state == 'Activo' ? 'success' : 'danger' }}">
                        <i class="fas fa-toggle-on"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Estado</span>
                        <span class="info-box-number">{{ $user->state }}</span>
                    </div>
                </div>
            </div>
            @endif
        </div>
        @endif

        <div class="row mt-4">
            <div class="col-12">
                <a href="{{ route('users.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left mr-1"></i>Volver
                </a>
            </div>
        </div>
            <a class="btn btn-secondary" href="{{ route('users.index') }}">Volver</a>
        </div>
    </div>
</div>
@endsection