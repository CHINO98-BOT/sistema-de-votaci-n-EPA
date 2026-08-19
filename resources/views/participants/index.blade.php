@extends('participants.layout')

@section('title', 'Gestión de Participantes')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Participantes</h3>
        <div class="card-tools">
            <a href="{{ route('participants.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Nuevo Participante
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

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Evento</th>
                    <th>Curso</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($participants as $participant)
                <tr>
                    <td>{{ $participant->id }}</td>
                    <td>
                        @if($participant->mainPhoto)
                            <img src="{{ asset('storage/' . $participant->mainPhoto->file_path) }}" 
                                 alt="{{ $participant->full_name }}" 
                                 style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                        @else
                            <div style="width: 50px; height: 50px; background: #f8f9fa; display: flex; align-items: center; justify-content: center; border-radius: 5px;">
                                <i class="fas fa-user text-muted"></i>
                            </div>
                        @endif
                    </td>
                    <td>{{ $participant->full_name }}</td>
                    <td>{{ $participant->event->name ?? 'N/A' }}</td>
                    <td>{{ $participant->course ?? 'N/A' }}</td>
                    <td>
                        <span class="badge badge-{{ $participant->status == 'activo' ? 'success' : 'secondary' }}">
                            {{ ucfirst($participant->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('participants.show', $participant->id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> Ver
                        </a>
                        <a href="{{ route('participants.edit', $participant->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="{{ route('participants.destroy', $participant->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este participante?')">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No hay participantes registrados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection