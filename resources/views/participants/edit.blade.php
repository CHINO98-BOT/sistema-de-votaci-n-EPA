@extends('participants.layout')

@section('title', 'Editar Participante')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Editar Participante</h3>
    </div>
    <form action="{{ route('participants.update', $participant->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="event_id">Evento *</label>
                        <select name="event_id" id="event_id" class="form-control @error('event_id') is-invalid @enderror" required>
                            <option value="">Seleccionar Evento</option>
                            @foreach($events as $event)
                                <option value="{{ $event->id }}" {{ $participant->event_id == $event->id ? 'selected' : '' }}>
                                    {{ $event->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('event_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="first_name">Nombre *</label>
                        <input type="text" name="first_name" id="first_name" 
                               class="form-control @error('first_name') is-invalid @enderror" 
                               value="{{ old('first_name', $participant->first_name) }}" required>
                        @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="last_name">Apellido *</label>
                        <input type="text" name="last_name" id="last_name" 
                               class="form-control @error('last_name') is-invalid @enderror" 
                               value="{{ old('last_name', $participant->last_name) }}" required>
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" name="dni" id="dni" 
                               class="form-control @error('dni') is-invalid @enderror" 
                               value="{{ old('dni', $participant->dni) }}">
                        @error('dni')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="course">Curso/División</label>
                        <input type="text" name="course" id="course" 
                               class="form-control @error('course') is-invalid @enderror" 
                               value="{{ old('course', $participant->course) }}">
                        @error('course')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea name="description" id="description" 
                                  class="form-control @error('description') is-invalid @enderror" 
                                  rows="3">{{ old('description', $participant->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="photo">Nueva Foto</label>
                        <input type="file" name="photo" id="photo" 
                               class="form-control-file @error('photo') is-invalid @enderror"
                               accept="image/*">
                        @error('photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror>
                        <small class="form-text text-muted">
                            Dejar vacío para mantener la foto actual
                        </small>
                        
                        @if($participant->mainPhoto)
                            <div class="mt-2">
                                <p>Foto actual:</p>
                                <img src="{{ asset('storage/' . $participant->mainPhoto->file_path) }}" 
                                     alt="{{ $participant->full_name }}" 
                                     style="max-height: 100px; border-radius: 5px;">
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="order">Orden de Aparición</label>
                        <input type="number" name="order" id="order" 
                               class="form-control @error('order') is-invalid @enderror" 
                               value="{{ old('order', $participant->order) }}">
                        @error('order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Estado</label>
                        <select name="status" id="status" class="form-control">
                            <option value="activo" {{ $participant->status == 'activo' ? 'selected' : '' }}>Activo</option>
                            <option value="inactivo" {{ $participant->status == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Actualizar
            </button>
            <a href="{{ route('participants.index') }}" class="btn btn-default">
                <i class="fas fa-arrow-left"></i> Cancelar
            </a>
        </div>
    </form>
</div>
@endsection