@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Crear Fire Risk Data</h3>
    </div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('fire_risk_data.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Timestamp</label>
                    <input class="form-control" type="text" name="timestamp" value="{{ old('timestamp') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Location</label>
                    <input class="form-control" type="text" name="location" value="{{ old('location') }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Duration</label>
                    <input class="form-control" type="number" step="any" name="duration" value="{{ old('duration') }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Volunteers</label>
                    <input class="form-control" type="number" name="volunteers" value="{{ old('volunteers') }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Coordinates</label>
                    <select class="form-select" name="coordinates_id" required>
                        @foreach($coordinates as $c)
                            <option value="{{ $c->id }}">{{ $c->lat }}, {{ $c->lng }}</option>
                        @endforeach
                    </select>
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