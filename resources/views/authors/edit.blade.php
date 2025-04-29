@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Autor</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('authors.update', $author->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Autor</label>
            <input type="text" class="form-control" name="name" id="name"
                value="{{ old('name', $author->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="birthdate" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" name="birthdate" id="birthdate"
                value="{{ old('birthdate', $author->birthdate ? \Illuminate\Support\Carbon::parse($author->birthdate)->format('Y-m-d') : '') }}"
                required>
        </div>

        <div class="mb-3">
            <label for="nationality" class="form-label">Nacionalidad</label>
            <select name="nationality" id="nationality" class="form-select" required>
                <option value="">Seleccione una nacionalidad</option>
                @foreach ($nationalities as $nationality)
                <option value="{{ $nationality }}"
                    {{ old('nationality', $author->nationality) == $nationality ? 'selected' : '' }}>
                    {{ $nationality }}
                </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection