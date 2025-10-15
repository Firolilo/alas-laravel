@extends('layouts.app')

@section('title', 'Editar Lugar')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-edit mr-2"></i>Editar Lugar
        </h3>
    </div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Error!</h5>
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('lugares.update', $lugar) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nombre del Lugar</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-map-pin"></i>
                                </span>
                            </div>
                            <input type="text" name="nombre_lugar" class="form-control @error('nombre_lugar') is-invalid @enderror" 
                                   value="{{ old('nombre_lugar', $lugar->nombre_lugar) }}" required>
                            @error('nombre_lugar')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Ubicación</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                            </div>
                            <input type="text" name="ubicacion" class="form-control @error('ubicacion') is-invalid @enderror" 
                                   value="{{ old('ubicacion', $lugar->ubicacion) }}">
                            @error('ubicacion')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tipo de Lugar</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-tag"></i>
                                </span>
                            </div>
                            <select name="tipo_lugar" class="form-control select2 @error('tipo_lugar') is-invalid @enderror" required>
                                <option value="">Seleccione un tipo</option>
                                @foreach(['Bosque', 'Zona Urbana', 'Parque', 'Reserva', 'Otro'] as $tipo)
                                    <option value="{{ $tipo }}" {{ old('tipo_lugar', $lugar->tipo_lugar) == $tipo ? 'selected' : '' }}>
                                        {{ $tipo }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tipo_lugar')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" 
                                  rows="3">{{ old('descripcion', $lugar->descripcion) }}</textarea>
                        @error('descripcion')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <a href="{{ route('lugares.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary float-right">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
