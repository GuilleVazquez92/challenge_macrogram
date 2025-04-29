<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .section-title {
            font-size: 1.8rem;
            font-weight: bold;
            margin: 40px 0 20px;
            text-align: center;
        }

        .card img {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body class="bg-white">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">MiApp</a>
            <form class="d-flex ms-auto" method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-light btn-sm" type="submit">Cerrar sesión</button>
            </form>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="text-center mb-5">
            <h2>Bienvenido, {{ auth()->user()->name }}</h2>
            <p class="text-muted">Explorá el contenido disponible en nuestra plataforma.</p>
        </div>

        {{-- Sección de Libros --}}
        <div class="section-title">Libros recomendados</div>
        <div class="row row-cols-1 row-cols-md-2 g-4 mb-5">
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1528207776546-365bb710ee93" class="card-img-top" alt="Libros">
                    <div class="card-body text-center">
                        <h5 class="card-title">Catálogo completo</h5>
                        <p class="card-text">Accedé a miles de títulos organizados por género, autor y más.</p>
                        <a href="{{ route('books.index') }}" class="btn btn-success">Ver libros</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1532012197267-da84d127e765" class="card-img-top" alt="Lecturas">
                    <div class="card-body text-center">
                        <h5 class="card-title">Lecturas imperdibles</h5>
                        <p class="card-text">Desde clásicos hasta las últimas novedades, encontrá tu próxima lectura.</p>
                        <a href="{{ route('books.index') }}" class="btn btn-success">Explorar libros</a>
                    </div>
                </div>
            </div>
        </div>


        {{-- Sección de Autores --}}
        <div class="section-title">Autores destacados</div>
        <div class="row row-cols-1 row-cols-md-2 g-4 mb-5">
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f" class="card-img-top" alt="Autores">
                    <div class="card-body text-center">
                        <h5 class="card-title">Autores clásicos</h5>
                        <p class="card-text">Conocé los grandes maestros de la literatura que marcaron generaciones.</p>
                        <a href="{{ route('authors.index') }}" class="btn btn-primary">Ver autores</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1529333166437-7750a6dd5a70" class="card-img-top" alt="Autores nuevos">
                    <div class="card-body text-center">
                        <h5 class="card-title">Nuevas voces</h5>
                        <p class="card-text">Descubrí autores emergentes y explorá nuevos estilos narrativos.</p>
                        <a href="{{ route('authors.index') }}" class="btn btn-primary">Explorar autores</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>