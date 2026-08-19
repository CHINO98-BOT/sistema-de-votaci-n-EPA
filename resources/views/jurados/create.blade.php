@extends('jurados.layout')

@section('title', 'Asignar Nuevo Jurado')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Asignar Jurado a Evento</h3>
    </div>
    <form action="{{ route('jurados.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="event_id">Evento *</label>
                <select name="event_id" id="event_id" class="form-control @error('event_id') is-invalid @enderror" required>
                    <option value="">Seleccionar Evento</option>
                    @foreach($eventos as $evento)
                        <option value="{{ $evento->id }}" {{ old('event_id') == $evento->id ? 'selected' : '' }}>
                            {{ $evento->name }}
                        </option>
                    @endforeach
                </select>
                @error('event_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="juror_user_id">Jurado *</label>
                <select name="juror_user_id" id="juror_user_id" class="form-control @error('juror_user_id') is-invalid @enderror" required>
                    <option value="">Seleccionar Jurado</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ old('juror_user_id') == $usuario->id ? 'selected' : '' }}>
                            {{ $usuario->name }} ({{ $usuario->email }})
                        </option>
                    @endforeach
                </select>
                @error('juror_user_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Guardar
            </button>
            <a href="{{ route('jurados.index') }}" class="btn btn-default">
                <i class="fas fa-arrow-left"></i> Cancelar
            </a>
        </div>
    </form>
</div>
@endsection