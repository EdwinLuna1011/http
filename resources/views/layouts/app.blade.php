<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pastelería | Mi Tienda</title>

    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <style>
        body { font-family: 'Inter', sans-serif; }
        
        .soft-bg { background-color: #fcfcfc; }
        
        .img-producto {
            height: 250px;
            width: 100%;
            object-fit: cover;
            border-radius: 0.75rem;
        }

        .img-detalle {
            height: 400px;
            width: 100%;
            object-fit: cover;
            border-radius: 1rem;
        }

        .producto-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .producto-card:hover {
            transform: translateY(-5px);
            border-color: #fbcfe8;
        }
    </style>
</head>

<body class="antialiased soft-bg text-gray-800 flex flex-col min-h-screen">

<nav class="bg-white/80 backdrop-blur-md border-b border-gray-100 sticky top-0 z-50">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="flex justify-between h-20">

<div class="flex items-center">
<a href="/" class="text-2xl font-bold tracking-tighter text-pink-500 uppercase">
PASTELERIA
</a>
</div>

<div class="hidden md:flex items-center space-x-8">
<a href="/" class="text-sm font-medium text-gray-500 hover:text-pink-500 transition">Inicio</a>
<a href="/nosotros" class="text-sm font-medium text-gray-500 hover:text-pink-500 transition">Nosotros</a>
<a href="/catalogo" class="text-sm font-medium text-gray-500 hover:text-pink-500 transition">Catálogo</a>
<a href="/contacto" class="text-sm font-medium text-gray-500 hover:text-pink-500 transition">Contacto</a>
</div>

<div class="flex items-center space-x-4">

{{-- 🔥 CARRITO DINÁMICO --}}
@php
$cantidad = session('carrito') ? count(session('carrito')) : 0;
@endphp

<a href="/carrito" class="relative inline-flex items-center p-2 text-sm font-medium text-gray-500 hover:text-pink-500 transition">
<span class="text-lg">🛒</span>
<div class="absolute inline-flex items-center justify-center w-5 h-5 text-[10px] font-bold text-white bg-pink-500 border-2 border-white rounded-full -top-0 -right-0">
{{ $cantidad }}
</div>
</a>

{{-- 🔥 LOGIN DINÁMICO --}}
@if(session('user'))
<a href="/perfil" class="text-sm font-medium text-gray-700 hover:text-pink-500">
{{ session('user')['nombre'] }}
</a>

<a href="/logout" class="text-sm font-medium text-red-500 hover:text-red-700">
Salir
</a>
@else
<a href="/login" class="text-sm font-medium text-gray-700 hover:text-pink-500">
Login
</a>

<a href="/registro" class="text-sm font-medium text-gray-700 hover:text-pink-500">
Registro
</a>
@endif

<button data-collapse-toggle="navbar-main" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100">
☰
</button>

</div>
</div>
</div>

<div class="hidden md:hidden border-t border-gray-100 bg-white" id="navbar-main">
<ul class="flex flex-col p-4 space-y-2">
<li><a href="/" class="block py-2 px-3 hover:bg-pink-50">Inicio</a></li>
<li><a href="/nosotros" class="block py-2 px-3 hover:bg-pink-50">Nosotros</a></li>
<li><a href="/catalogo" class="block py-2 px-3 hover:bg-pink-50">Catálogo</a></li>
<li><a href="/contacto" class="block py-2 px-3 hover:bg-pink-50">Contacto</a></li>
</ul>
</div>
</nav>

<div class="max-w-7xl mx-auto px-6 py-10 w-full flex-grow">
@yield('content')
</div>

<footer class="bg-white border-t border-gray-100 mt-auto">
<div class="max-w-7xl mx-auto py-12 px-6">
<div class="flex flex-col md:flex-row justify-between items-center gap-6">
<div class="text-xl font-bold text-pink-500 uppercase">PASTELERIA</div>
<div class="text-sm text-gray-400">
© 2026 Repostería Artesanal.
</div>
</div>
</div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>