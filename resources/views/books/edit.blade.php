@extends('layouts.app')

@section('title', 'Editar Libro')

@section('content')
<h1>Editar Libro</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Por favor corrige los siguientes errores:</strong>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('books.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label">Título</label>
        <input type="text" name="title" id="title" class="form-control"
            value="{{ old('title', $book->title) }}" >
        @error('title')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="isbn" class="form-label">ISBN</label>
        <input type="text" name="isbn" id="isbn" class="form-control"
            value="{{ old('isbn', $book->isbn) }}" >
        @error('isbn')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="author_id" class="form-label">Autor</label>
        <select name="author_id" id="author_id" class="form-select" required>
            <option value="">Seleccionar autor</option>
            @foreach ($authors as $author)
            <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>
                {{ $author->id }} - {{ $author->name }}
            </option>
            @endforeach
        </select>
        @error('author_id')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="published_date" class="form-label">Fecha de publicación</label>
        <input type="date" name="published_date" id="published_date" class="form-control"
            value="{{ old('published_date', \Carbon\Carbon::parse($book->published_date)->format('Y-m-d')) }}">
        @error('published_date')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection