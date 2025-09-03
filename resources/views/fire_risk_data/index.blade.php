@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Fire Risk Data</h3>
        <a class="btn btn-primary" href="{{ route('fire_risk_data.create') }}">Crear registro</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped table-bordered">
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
                            <a class="btn btn-sm btn-info" href="{{ route('fire_risk_data.show', $item) }}">Ver</a>
                            <a class="btn btn-sm btn-warning" href="{{ route('fire_risk_data.edit', $item) }}">Editar</a>
                            <form action="{{ route('fire_risk_data.destroy', $item) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
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