@extends('layouts.app')

@section('title', 'Crear Biomasa')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-leaf mr-2"></i>Reporte de Zonas de Biomasa - Chiquitanía</h3>
        <div class="card-tools">
            <span class="badge badge-success">Formulario</span>
        </div>
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
            
            <!-- Información básica -->
            <div class="card card-outline card-default mb-3">
                <div class="card-header">
                    <h3 class="card-title">Información básica</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Fecha de observación</label>
                                <div class="input-group" style="max-width: 300px;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" class="form-control" name="fecha_observacion" placeholder="dd/mm/aaaa">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>Tipo de biomasa</label>
                                <select name="tipo_biomasa" class="form-control select2 @error('tipo_biomasa') is-invalid @enderror" required>
                                    <option value="">Seleccione...</option>
                                    @foreach(['Bosque','Sabana','Humedal','Matorral'] as $tipo)
                                        <option value="{{ $tipo }}" {{ old('tipo_biomasa') == $tipo ? 'selected' : '' }}>{{ $tipo }}</option>
                                    @endforeach
                                </select>
                                @error('tipo_biomasa')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>Estado de conservación</label>
                                <select name="degradacion" class="form-control select2 @error('degradacion') is-invalid @enderror" required>
                                    <option value="">Seleccione...</option>
                                    @foreach(['Excelente','Bueno (ligera perturbación)','Medio','Degradado'] as $estado)
                                        <option value="{{ $estado }}" {{ old('degradacion') == $estado ? 'selected' : '' }}>{{ $estado }}</option>
                                    @endforeach
                                </select>
                                @error('degradacion')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>Densidad de vegetación</label>
                                <select name="densidad" class="form-control select2 @error('densidad') is-invalid @enderror" required>
                                    <option value="">Seleccione...</option>
                                    @foreach(['Baja (0-30% cobertura)','Media (30-70% cobertura)','Alta (70-100% cobertura)'] as $den)
                                        <option value="{{ $den }}" {{ old('densidad') == $den ? 'selected' : '' }}>{{ $den }}</option>
                                    @endforeach
                                </select>
                                @error('densidad')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Delimitación del área -->
            <div class="card card-secondary mb-3">
                <div class="card-header">
                    <h3 class="card-title">Delimitación del área</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-2">Haz clic en el mapa para marcar los límites del área (Mínimo 3 puntos)</p>
                    <div id="biomasa-map" style="height: 320px; border-radius: .25rem;"></div>
                    <small class="d-block mt-2 text-muted">Puntos marcados: 0</small>
                </div>
            </div>

            <!-- Observaciones -->
            <div class="card card-secondary mb-3">
                <div class="card-header">
                    <h3 class="card-title">Observaciones</h3>
                </div>
                <div class="card-body">
                    <textarea class="form-control" rows="4" placeholder="Describe características relevantes de la biomasa observada..."></textarea>
                </div>
            </div>
            
            <div class="card-footer bg-white border-0 px-0">
                <button type="submit" class="btn btn-success">Enviar Reporte de Biomasa</button>
                <a href="{{ route('biomasas.index') }}" class="btn btn-default float-right">Cancelar</a>
            </div>
        </form>
    </div>
</div>
<div class="card card-outline card-light mt-3">
    <div class="card-body text-center p-3">
        <small class="d-block text-muted mb-1">¡Gracias por contribuir al monitoreo de los recursos naturales de la Chiquitanía!</small>
        <small class="d-block text-muted">Tu reporte ayuda en la conservación y manejo sostenible de la biomasa regional.</small>
    </div>
</div>
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (!window.L) return;
        var map = L.map('biomasa-map');
        var center = [-17.9, -62.9];
        map.setView(center, 10);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);
    });
</script>
@endpush
@endsection
