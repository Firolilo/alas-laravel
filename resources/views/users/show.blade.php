@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Usuario #{{ $user->id }}</h3>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item"><strong>Nombre:</strong> {{ $user->nombre }}</li>
            <li class="list-group-item"><strong>Apellido:</strong> {{ $user->apellido }}</li>
            <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
            <li class="list-group-item"><strong>CI:</strong> {{ $user->ci }}</li>
            <li class="list-group-item"><strong>Telefono:</strong> {{ $user->telefono }}</li>
            <li class="list-group-item"><strong>Entidad:</strong> {{ $user->entidad_perteneciente }}</li>
            <li class="list-group-item"><strong>Estado:</strong> {{ $user->state }}</li>
        </ul>

        <div class="mt-3">
            <a class="btn btn-warning" href="{{ route('users.edit', $user) }}">Editar</a>
            <a class="btn btn-secondary" href="{{ route('users.index') }}">Volver</a>
        </div>
    </div>
</div>
@endsection