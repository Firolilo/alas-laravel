@extends('layouts.app')

@section('title', 'Lugares')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-map-marker-alt mr-2"></i>Lugares
        </h3>
        <div class="card-tools">
            <a href="{{ route('lugares.create') }}" class="btn btn-primary">
                <i class="fas fa-plus mr-1"></i>Nuevo Lugar
            </a>
        </div>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> ¡Éxito!</h5>
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Ubicación</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lugares as $lugar)
                        <tr>
                            <td>{{ $lugar->id }}</td>
                            <td>{{ $lugar->nombre_lugar }}</td>
                            <td>{{ $lugar->ubicacion ?? 'N/A' }}</td>
                            <td>{{ $lugar->tipo_lugar }}</td>
                            <td>
                                <a href="{{ route('lugares.show', $lugar) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('lugares.edit', $lugar) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('lugares.destroy', $lugar) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este lugar?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $lugares->links() }}
        </div>
    </div>
</div>
@endsection
