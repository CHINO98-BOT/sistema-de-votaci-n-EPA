@extends('jurados.layout')

@section('title', 'Detalles del Jurado')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detalles de la Asignación</h3>
        <div class="card-tools">
            <a href="{{ route('jurados.index') }}" class="btn btn-default">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h4>Información del Evento</h4>
                <p><strong>ID:</strong> {{ $jurado->id }}</p>
                <p><strong>Evento:</strong> {{ $jurado->event->name ?? 'N/A' }}</p>
                <p><strong>Creado:</strong> {{ $jurado->created_at->format('d/m/Y H:i') }}</p>
            </div>
            <div class="col-md-6">
                <h4>Información del Jurado</h4>
                <p><strong>Nombre:</strong> {{ $jurado->juror->name ?? 'N/A' }}</p>
                <p><strong>Email:</strong> {{ $jurado->juror->email ?? 'N/A' }}</p>
                <p><strong>Actualizado:</strong> {{ $jurado->updated_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('jurados.edit', $jurado->id) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Editar
        </a>
        <form action="{{ route('jurados.destroy', $jurado->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este jurado?')">
                <i class="fas fa-trash"></i> Eliminar
            </button>
        </form>
    </div>
</div>
@endsection