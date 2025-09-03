@extends('layouts.app')

@section('content')
<h1>Editar Fire Risk Data</h1>

@if($errors->any())
<div>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('fire_risk_data.update', $fireRiskData) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Timestamp</label>
    <input type="text" name="timestamp" value="{{ old('timestamp', $fireRiskData->timestamp) }}" required>
    <label>Location</label>
    <input type="text" name="location" value="{{ old('location', $fireRiskData->location) }}" required>
    <label>Duration</label>
    <input type="number" step="any" name="duration" value="{{ old('duration', $fireRiskData->duration) }}" required>
    <label>Volunteers</label>
    <input type="number" name="volunteers" value="{{ old('volunteers', $fireRiskData->volunteers) }}" required>
    <label>Coordinates</label>
    <select name="coordinates_id" required>
        @foreach($coordinates as $c)
        <option value="{{ $c->id }}" @if($c->id == $fireRiskData->coordinates_id) selected @endif>{{ $c->lat }}, {{ $c->lng }}</option>
        @endforeach
    </select>
    <label>Fire Risk</label>
    <input type="number" step="any" name="fire_risk" value="{{ old('fire_risk', $fireRiskData->fire_risk) }}" required>
    <label>Fire Detected</label>
    <select name="fire_detected">
        <option value="0" @if(!$fireRiskData->fire_detected) selected @endif>No</option>
        <option value="1" @if($fireRiskData->fire_detected) selected @endif>Yes</option>
    </select>

    <button type="submit">Actualizar</button>
</form>
@endsection