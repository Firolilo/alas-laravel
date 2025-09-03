@extends('layouts.app')

@section('title', 'Biomasas')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-leaf mr-2"></i>Biomasas
        </h3>
        <div class="card-tools">
            <a href="{{ route('biomasas.create') }}" class="btn btn-primary">
                <i class="fas fa-plus mr-1"></i>Nueva Biomasa
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
                        <th>Tipo</th>
                        <th>Densidad</th>
                        <th>Poder Calorífico</th>
                        <th>Degradación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($biomasas as $biomasa)
                        <tr>
                            <td>{{ $biomasa->id }}</td>
                            <td>{{ $biomasa->tipo_biomasa }}</td>
                            <td>
                                <span class="badge badge-{{ $biomasa->densidad == 'Alta' ? 'danger' : ($biomasa->densidad == 'Media' ? 'warning' : 'success') }}">
                                    {{ $biomasa->densidad }}
                                </span>
                            </td>
                            <td>{{ $biomasa->poder_calorifico }} MJ/kg</td>
                            <td>
                                <span class="badge badge-{{ $biomasa->degradacion == 'Alta' ? 'danger' : ($biomasa->degradacion == 'Media' ? 'warning' : 'success') }}">
                                    {{ $biomasa->degradacion }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('biomasas.show', $biomasa) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('biomasas.edit', $biomasa) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('biomasas.destroy', $biomasa) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar esta biomasa?')">
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
            {{ $biomasas->links() }}
        </div>
    </div>
</div>
@endsection
