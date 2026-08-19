@extends('participants.layout')

@section('title', 'Registrar Nuevo Participante')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Registrar Nuevo Participante</h3>
    </div>
    <form action="{{ route('participants.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="event_id">Evento *</label>
                        <select name="event_id" id="event_id" class="form-control @error('event_id') is-invalid @enderror" required>
                            <option value="">Seleccionar Evento</option>
                            @foreach($events as $event)
                                <option value="{{ $event->id }}" {{ old('event_id') == $event->id ? 'selected' : '' }}>
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
                               value="{{ old('first_name') }}" required>
                        @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="last_name">Apellido *</label>
                        <input type="text" name="last_name" id="last_name" 
                               class="form-control @error('last_name') is-invalid @enderror" 
                               value="{{ old('last_name') }}" required>
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" name="dni" id="dni" 
                               class="form-control @error('dni') is-invalid @enderror" 
                               value="{{ old('dni') }}">
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
                               value="{{ old('course') }}">
                        @error('course')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea name="description" id="description" 
                                  class="form-control @error('description') is-invalid @enderror" 
                                  rows="3">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="photo">Foto del Participante</label>
                        <input type="file" name="photo" id="photo" 
                               class="form-control-file @error('photo') is-invalid @enderror"
                               accept="image/*">
                        @error('photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">
                            Formatos: JPEG, PNG, JPG, GIF. Tamaño máximo: 2MB
                        </small>
                    </div>

                    <div class="form-group">
                        <label for="order">Orden de Aparición</label>
                        <input type="number" name="order" id="order" 
                               class="form-control @error('order') is-invalid @enderror" 
                               value="{{ old('order', 0) }}">
                        @error('order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Guardar
            </button>
            <a href="{{ route('participants.index') }}" class="btn btn-default">
                <i class="fas fa-arrow-left"></i> Cancelar
            </a>
        </div>
    </form>
</div>
@endsection