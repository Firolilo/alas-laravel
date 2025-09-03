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
                                <span class="input-group-text">
                                    <i class="fas fa-clock"></i>
                                </span>
                            </div>
                            <input type="datetime-local" name="timestamp" 
                                   class="form-control @error('timestamp') is-invalid @enderror" 
                                   value="{{ old('timestamp') }}" required
                                   placeholder="Seleccione fecha y hora">
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
                                <span class="input-group-text">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                            </div>
                            <input type="text" name="location"
                                   class="form-control @error('location') is-invalid @enderror" 
                                   value="{{ old('location') }}" required 
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

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Fire Risk</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-fire"></i>
                                </span>
                            </div>
                            <input type="number" name="fire_risk" step="any"
                                   class="form-control @error('fire_risk') is-invalid @enderror"
                                   value="{{ old('fire_risk') }}" required
                                   placeholder="Nivel de riesgo">
                            @error('fire_risk')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Fire Detected</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-fire-extinguisher"></i>
                                </span>
                            </div>
                            <select name="fire_detected" 
                                    class="form-control select2 @error('fire_detected') is-invalid @enderror">
                                <option value="0" {{ old('fire_detected') == '0' ? 'selected' : '' }}>No</option>
                                <option value="1" {{ old('fire_detected') == '1' ? 'selected' : '' }}>Yes</option>
                            </select>
                            @error('fire_detected')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Volunteer Name (opcional)</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user-shield"></i>
                                </span>
                            </div>
                            <input type="text" name="volunteer_name"
                                   class="form-control @error('volunteer_name') is-invalid @enderror"
                                   value="{{ old('volunteer_name') }}"
                                   placeholder="Nombre del voluntario">
                            @error('volunteer_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <a href="{{ route('fire_risk_data.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-1"></i>Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary float-right">
                        <i class="fas fa-save mr-1"></i>Guardar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection