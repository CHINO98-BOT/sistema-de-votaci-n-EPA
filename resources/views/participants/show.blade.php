@extends('participants.layout')

@section('title', 'Detalles del Participante')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detalles del Participante</h3>
        <div class="card-tools">
            <a href="{{ route('participants.index') }}" class="btn btn-default">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                @if($participant->mainPhoto)
                    <img src="{{ asset('storage/' . $participant->mainPhoto->file_path) }}" 
                         alt="{{ $participant->full_name }}" 
                         class="img-fluid rounded" style="max-height: 300px;">
                @else
                    <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 300px;">
                        <i class="fas fa-user fa-5x text-muted"></i>
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <h4>Información Personal</h4>
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Nombre Completo:</th>
                        <td>{{ $participant->full_name }}</td>
                    </tr>
                    <tr>
                        <th>DNI:</th>
                        <td>{{ $participant->dni ?? 'No especificado' }}</td>
                    </tr>
                    <tr>
                        <th>Curso/División:</th>
                        <td>{{ $participant->course ?? 'No especificado' }}</td>
                    </tr>
                    <tr>
                        <th>Evento:</th>
                        <td>{{ $participant->event->name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Estado:</th>
                        <td>
                            <span class="badge badge-{{ $participant->status == 'activo' ? 'success' : 'secondary' }}">
                                {{ ucfirst($participant->status) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Orden:</th>
                        <td>{{ $participant->order }}</td>
                    </tr>
                    @if($participant->description)
                    <tr>
                        <th>Descripción:</th>
                        <td>{{ $participant->description }}</td>
                    </tr>
                    @endif
                    <tr>
                        <th>Fecha de Registro:</th>
                        <td>{{ $participant->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('participants.edit', $participant->id) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Editar
        </a>
        <form action="{{ route('participants.destroy', $participant->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este participante?')">
                <i class="fas fa-trash"></i> Eliminar
            </button>
        </form>
    </div>
</div>
@endsection