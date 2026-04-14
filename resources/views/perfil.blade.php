@extends('layouts.app')

@section('content')

<h2 class="text-2xl font-bold mb-4">Perfil</h2>

{{-- MENSAJES --}}
@if(session('success'))
<div class="bg-green-100 text-green-700 p-3 rounded mb-4">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="bg-red-100 text-red-700 p-3 rounded mb-4">
    {{ session('error') }}
</div>
@endif

{{-- IMAGEN --}}
@php
$imagen = null;

if(!empty($usuario['imagen'])){
    // separar partes de la URL
    $partes = explode('/', $usuario['imagen']);
    $nombreArchivo = end($partes);

    // codificar SOLO el nombre del archivo (espacios)
    $nombreArchivo = rawurlencode($nombreArchivo);

    // reconstruir la URL
    array_pop($partes);
    $ruta = implode('/', $partes);

    // corregir localhost
    $imagen = str_replace('localhost', '127.0.0.1', $ruta . '/' . $nombreArchivo);
}
@endphp

@if($imagen)
    <img 
    src="{{ $imagen }}?v={{ time() }}" 
    class="w-40 h-40 object-cover rounded-full mb-4 border shadow">
@else
    <img 
    src="https://via.placeholder.com/150" 
    class="w-40 h-40 object-cover rounded-full mb-4 border shadow">
@endif

{{-- DATOS --}}
<div class="bg-white p-4 rounded shadow mb-6">
<h3 class="font-bold mb-2">Datos personales</h3>

<form method="POST" action="/perfil/actualizar">
@csrf

<input type="text" name="nombre" value="{{ $usuario['nombre'] }}" class="w-full border p-2 mb-2 rounded">
<input type="email" name="email" value="{{ $usuario['email'] }}" class="w-full border p-2 mb-2 rounded">
<input type="text" name="puesto" value="{{ $usuario['puesto'] }}" class="w-full border p-2 mb-2 rounded">

<button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
Actualizar datos
</button>

</form>
</div>

{{-- PASSWORD --}}
<div class="bg-white p-4 rounded shadow mb-6">
<h3 class="font-bold mb-2">Cambiar contraseña</h3>

<form method="POST" action="/perfil/password">
@csrf

<input type="password" name="actual" placeholder="Contraseña actual" class="w-full border p-2 mb-2 rounded">
<input type="password" name="nueva" placeholder="Nueva contraseña" class="w-full border p-2 mb-2 rounded">

<button class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
Cambiar contraseña
</button>

</form>
</div>

{{-- SUBIR IMAGEN --}}
<div class="bg-white p-4 rounded shadow">
<h3 class="font-bold mb-2">Actualizar imagen</h3>

<form method="POST" action="/perfil/imagen" enctype="multipart/form-data">
@csrf

<input type="file" name="imagen" class="w-full border p-2 mb-3 rounded" onchange="preview(event)">

<img id="preview" class="w-40 h-40 mt-2 rounded-full hidden">

<button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
Subir imagen
</button>

</form>
</div>

<script>
function preview(event) {
    const img = document.getElementById('preview');
    img.src = URL.createObjectURL(event.target.files[0]);
    img.classList.remove('hidden');
}
</script>

@endsection