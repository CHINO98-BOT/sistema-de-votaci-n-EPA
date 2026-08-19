@extends('jurados.layout')

@section('title', 'Gestión de Jurados')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Jurados Asignados</h3>
        <div class="card-tools">
            <a href="{{ route('jurados.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Asignar Nuevo Jurado
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

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> ¡Error!</h5>
                {{ session('error') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Evento</th>
                    <th>Jurado</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jurados as $jurado)
                <tr>
                    <td>{{ $jurado->id }}</td>
                    <td>{{ $jurado->event->name ?? 'N/A' }}</td>
                    <td>{{ $jurado->juror->name ?? 'N/A' }}</td>
                    <td>{{ $jurado->juror->email ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('jurados.show', $jurado->id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> Ver
                        </a>
                        <a href="{{ route('jurados.edit', $jurado->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="{{ route('jurados.destroy', $jurado->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este jurado?')">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No hay jurados asignados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection