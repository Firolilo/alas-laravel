@extends('layouts.app')

@section('content')
<h1>Fire Risk Data #{{ $item->id }}</h1>

<ul>
    <li>Timestamp: {{ $item->timestamp }}</li>
    <li>Location: {{ $item->location }}</li>
    <li>Duration: {{ $item->duration }}</li>
    <li>Volunteers: {{ $item->volunteers }}</li>
    <li>Fire Risk: {{ $item->fire_risk }}</li>
    <li>Fire Detected: {{ $item->fire_detected ? 'Yes' : 'No' }}</li>
    <li>Coordinates: {{ optional($item->coordinate)->lat }}, {{ optional($item->coordinate)->lng }}</li>
</ul>

<a href="{{ route('fire_risk_data.edit', $item) }}">Editar</a>
<a href="{{ route('fire_risk_data.index') }}">Volver</a>
@endsection