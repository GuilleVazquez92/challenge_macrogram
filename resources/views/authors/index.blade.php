@extends('layouts.app')

@section('title', 'Autores')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Autores</h1>
    <a href="{{ route('authors.create') }}" class="btn btn-success">Nuevo Autor</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow-sm">
    <div class="card-body">
        <table id="authorsTable" class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Nacionalidad</th>
                    <th>Cumpleaños</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                <tr>
                    <td>{{ $author->id }}</td>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->nationality }}</td>
                    <td>{{ $author->birthdate }}</td>
                    <td>
                        <a href="{{ route('authors.edit', $author) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                        <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteModal" data-id="{{ $author->id }}"
                            data-name="{{ $author->name }}">
                            Eliminar
                        </button>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
<!-- Modal de Confirmación -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmar eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro que deseas eliminar al autor <strong id="authorName"></strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#authorsTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
            }
        });

        var deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var authorId = button.getAttribute('data-id');
            var authorName = button.getAttribute('data-name');

            var modalTitle = deleteModal.querySelector('#authorName');
            var form = document.getElementById('deleteForm');

            modalTitle.textContent = authorName;
            form.action = `/authors/${authorId}`;
        });
    });
</script>
@endpush