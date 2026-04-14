@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto">
    <nav class="flex mb-8" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="/catalogo" class="text-sm font-medium text-gray-500 hover:text-pink-500 transition">Catálogo</a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/></svg>
                    <span class="ml-1 text-sm font-bold text-gray-900 md:ml-2">{{ $producto['nombre'] }}</span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
        
        <div class="space-y-4">
            <div class="overflow-hidden rounded-3xl bg-gray-100 shadow-sm border border-gray-100">
                <img src="{{ $producto['imagen1'] }}" class="img-detalle w-full h-auto object-cover hover:scale-105 transition duration-500" alt="{{ $producto['nombre'] }}">
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                @if($producto['imagen2'])
                <div class="overflow-hidden rounded-2xl bg-gray-100 border border-gray-100 h-48">
                    <img src="{{ $producto['imagen2'] }}" class="w-full h-full object-cover hover:opacity-80 transition cursor-pointer" alt="Vista secundaria">
                </div>
                @endif

                @if($producto['imagen3'])
                <div class="overflow-hidden rounded-2xl bg-gray-100 border border-gray-100 h-48">
                    <img src="{{ $producto['imagen3'] }}" class="w-full h-full object-cover hover:opacity-80 transition cursor-pointer" alt="Vista detalle">
                </div>
                @endif
            </div>
        </div>

        <div class="flex flex-col">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-4 tracking-tight leading-none">
                {{ $producto['nombre'] }}
            </h1>
            
            <div class="mb-6">
                <span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                    En Inventario: {{ $producto['stock'] }} unidades
                </span>
            </div>

            <div class="mb-8 p-6 bg-white border border-gray-100 rounded-2xl shadow-sm">
                <h3 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-2">Descripción</h3>
                <p class="text-gray-600 leading-relaxed text-lg">
                    {{ $producto['descripcion'] }}
                </p>
            </div>

            <div class="mt-auto">
                <div class="flex items-center justify-between mb-8 px-2">
                    <span class="text-gray-500 font-medium">Precio por unidad</span>
                    <span class="text-4xl font-black text-gray-900 tracking-tighter">$ {{ number_format($producto['precio'], 2) }}</span>
                </div>

                <form action="/carrito/agregar" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="id_producto" value="{{ $producto['id_producto'] }}">
                    <input type="hidden" name="nombre" value="{{ $producto['nombre'] }}">
                    <input type="hidden" name="precio" value="{{ $producto['precio'] }}">
                    <input type="hidden" name="imagen" value="{{ $producto['imagen1'] }}">

                    <button type="submit" class="flex items-center justify-center w-full px-8 py-4 text-lg font-bold text-white bg-pink-500 rounded-2xl hover:bg-pink-600 focus:ring-4 focus:ring-pink-200 transition-all transform active:scale-95 shadow-xl shadow-pink-100">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        Añadir al Carrito
                    </button>
                </form>

                <p class="mt-6 text-center text-sm text-gray-400">
                    ✨ Compra segura y entrega garantizada en 24h.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection