@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Editar Usuario</h3>
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

        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Nombre</label>
                    <input class="form-control" type="text" name="nombre" value="{{ old('nombre', $user->nombre) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Apellido</label>
                    <input class="form-control" type="text" name="apellido" value="{{ old('apellido', $user->apellido) }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input class="form-control" type="email" name="email" value="{{ old('email', $user->email) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">CI</label>
                    <input class="form-control" type="text" name="ci" value="{{ old('ci', $user->ci) }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Password (dejar en blanco para mantener)</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Telefono</label>
                    <input class="form-control" type="text" name="telefono" value="{{ old('telefono', $user->telefono) }}">
                </div>
            </div>

            <div class="d-flex gap-2">
                <a class="btn btn-secondary" href="{{ route('users.index') }}">Cancelar</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>
</div>
@endsection