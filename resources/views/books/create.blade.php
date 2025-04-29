@extends('layouts.app')

@section('content')
<h1>Crear Autor</h1>

<form action="{{ route('books.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nombre del Libro" required>
    <button type="submit">Guardar</button>
</form>
@endsection
