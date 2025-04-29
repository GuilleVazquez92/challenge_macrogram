@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Autor</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('authors.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Autor</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="birthdate" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" name="birthdate" id="birthdate" value="{{ old('birthdate') }}" required>
        </div>

        <div class="mb-3">
            <label for="nationality" class="form-label">Nacionalidad</label>
            <select name="nationality" id="nationality" class="form-select" required>
                <option value="">Seleccione una nacionalidad</option>
                @foreach ($nationalities as $nationality)
                <option value="{{ $nationality }}" {{ old('nationality') == $nationality ? 'selected' : '' }}>
                    {{ $nationality }}
                </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection