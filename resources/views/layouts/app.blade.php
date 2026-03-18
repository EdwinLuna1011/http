<!DOCTYPE html>
<html>
<head>
    <title>Mi Tienda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .img-producto {
        height: 250px;
        object-fit: cover;
    }

    .img-detalle {
        height: 300px;
        width: 100%;
        object-fit: cover;
    }

    .card:hover {
        transform: scale(1.03);
        transition: 0.3s;
    }
    </style>

</head>
<body>

<nav class="navbar navbar-dark bg-dark navbar-expand">
<div class="container">

<a class="navbar-brand" href="/">Tienda</a>

<ul class="navbar-nav">
<li class="nav-item"><a class="nav-link" href="/">Inicio</a></li>
<li class="nav-item"><a class="nav-link" href="/nosotros">Nosotros</a></li>
<li class="nav-item"><a class="nav-link" href="/catalogo">Catálogo</a></li>
<li class="nav-item"><a class="nav-link" href="/contacto">Contacto</a></li>
</ul>

</div>
</nav>

<div class="container mt-4">
@yield('content')
</div>

<footer class="bg-dark text-white text-center p-3 mt-4">
Mi tienda © 2026
</footer>

</body>
</html>