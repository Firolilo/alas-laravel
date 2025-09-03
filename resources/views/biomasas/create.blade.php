@extends('layouts.app')

@section('title', 'Crear Biomasa')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-leaf mr-2"></i>Crear Nueva Biomasa
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

        <form action="{{ route('biomasas.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tipo de Biomasa</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-seedling"></i>
                                </span>
                            </div>
                            <input type="text" name="tipo_biomasa" class="form-control @error('tipo_biomasa') is-invalid @enderror" 
                                   value="{{ old('tipo_biomasa') }}" required placeholder="Ej: Madera, Pasto">
                            @error('tipo_biomasa')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Poder Calorífico (MJ/kg)</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-fire"></i>
                                </span>
                            </div>
                            <input type="number" step="0.01" name="poder_calorifico" 
                                   class="form-control @error('poder_calorifico') is-invalid @enderror" 
                                   value="{{ old('poder_calorifico') }}" required placeholder="Ej: 18.5">
                            @error('poder_calorifico')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Densidad</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-weight"></i>
                                </span>
                            </div>
                            <select name="densidad" class="form-control select2 @error('densidad') is-invalid @enderror" required>
                                <option value="">Seleccione la densidad</option>
                                @foreach(['Baja', 'Media', 'Alta'] as $densidad)
                                    <option value="{{ $densidad }}" {{ old('densidad') == $densidad ? 'selected' : '' }}>
                                        {{ $densidad }}
                                    </option>
                                @endforeach
                            </select>
                            @error('densidad')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Degradación</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-chart-line"></i>
                                </span>
                            </div>
                            <select name="degradacion" class="form-control select2 @error('degradacion') is-invalid @enderror" required>
                                <option value="">Seleccione la degradación</option>
                                @foreach(['Baja', 'Media', 'Alta'] as $degradacion)
                                    <option value="{{ $degradacion }}" {{ old('degradacion') == $degradacion ? 'selected' : '' }}>
                                        {{ $degradacion }}
                                    </option>
                                @endforeach
                            </select>
                            @error('degradacion')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" 
                                  rows="3" placeholder="Descripción opcional">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <a href="{{ route('biomasas.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary float-right">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
