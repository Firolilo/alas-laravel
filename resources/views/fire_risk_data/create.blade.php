@extends('layouts.app')

@section('title', 'Crear Fire Risk Data')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-fire mr-2"></i>Crear Nuevo Registro de Riesgo de Incendio</h3>
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

        <form action="{{ route('fire_risk_data.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Timestamp</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            </div>
                            <input type="datetime-local" class="form-control @error('timestamp') is-invalid @enderror" 
                                   name="timestamp" value="{{ old('timestamp') }}" required>
                            @error('timestamp')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Location</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            </div>
                            <input type="text" class="form-control @error('location') is-invalid @enderror" 
                                   name="location" value="{{ old('location') }}" required 
                                   placeholder="Ingrese la ubicación">
                            @error('location')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Duration</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-hourglass-half"></i></span>
                            </div>
                            <input type="number" step="any" class="form-control @error('duration') is-invalid @enderror" 
                                   name="duration" value="{{ old('duration') }}" required 
                                   placeholder="Duración en horas">
                            @error('duration')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Volunteers</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-users"></i></span>
                            </div>
                            <input type="number" class="form-control @error('volunteers') is-invalid @enderror" 
                                   name="volunteers" value="{{ old('volunteers') }}" required 
                                   placeholder="Número de voluntarios">
                            @error('volunteers')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Coordinates</label>
                        <select class="form-control select2 @error('coordinates_id') is-invalid @enderror" 
                                name="coordinates_id" required 
                                data-placeholder="Seleccione las coordenadas">
                            <option value="">Seleccione una opción</option>
                            @foreach($coordinates as $c)
                                <option value="{{ $c->id }}" {{ old('coordinates_id') == $c->id ? 'selected' : '' }}>
                                    {{ $c->lat }}, {{ $c->lng }}
                                </option>
                            @endforeach
                        </select>
                        @error('coordinates_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Fire Risk</label>
                    <input class="form-control" type="number" step="any" name="fire_risk" value="{{ old('fire_risk') }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Fire Detected</label>
                    <select class="form-select" name="fire_detected">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Volunteer Name (opcional)</label>
                    <input class="form-control" type="text" name="volunteer_name" value="{{ old('volunteer_name') }}">
                </div>
            </div>

            <div class="d-flex gap-2">
                <a class="btn btn-secondary" href="{{ route('fire_risk_data.index') }}">Cancelar</a>
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </form>
    </div>
</div>
@endsection