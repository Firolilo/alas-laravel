@extends('layouts.app')

@section('title', 'Fire Risk Data')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-fire mr-2"></i>Fire Risk Data
        </h3>
        <div class="card-tools">
            <a href="{{ route('fire_risk_data.create') }}" class="btn btn-primary">
                <i class="fas fa-plus mr-1"></i>Nuevo Registro
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
                    <th>Timestamp</th>
                    <th>Location</th>
                    <th>Duration</th>
                    <th>Volunteers</th>
                    <th>Fire Risk</th>
                    <th>Fire Detected</th>
                    <th>Coordinates</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->timestamp }}</td>
                        <td>{{ $item->location }}</td>
                        <td>{{ $item->duration }}</td>
                        <td>{{ $item->volunteers }}</td>
                        <td>{{ $item->fire_risk }}</td>
                        <td>{{ $item->fire_detected ? 'Yes' : 'No' }}</td>
                        <td>{{ optional($item->coordinate)->lat }}, {{ optional($item->coordinate)->lng }}</td>
                        <td>
                            <a href="{{ route('fire_risk_data.show', $item) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('fire_risk_data.edit', $item) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('fire_risk_data.destroy', $item) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este registro?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            {{ $items->links() }}
        </div>
    </div>
</div>
@endsection