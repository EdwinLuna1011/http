@extends('layouts.app')

@section('content')

<header class="mb-12 text-center">
    <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl">
        Nuestro <span class="text-pink-500">Catálogo</span>
    </h1>
    <p class="mt-4 text-lg text-gray-500 max-w-2xl mx-auto italic">
        Descubre nuestras creaciones artesanales, horneadas diariamente con los mejores ingredientes.
    </p>
</header>

<div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">

    @foreach($productos as $p)
    
    <div class="group relative flex flex-col bg-white border border-gray-100 rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 card-producto">
        
        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden bg-gray-200">
            <img src="{{ $p['imagen1'] }}" 
                 alt="{{ $p['nombre'] }}" 
                 class="img-producto object-center group-hover:scale-110 transition-transform duration-500">
            
            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full shadow-sm">
                <span class="text-sm font-bold text-gray-900">$ {{ number_format($p['precio'], 2) }}</span>
            </div>
        </div>

        <div class="flex flex-col flex-1 p-6 text-center">
            <h3 class="text-xl font-bold text-gray-900 mb-2 tracking-tight">
                {{ $p['nombre'] }}
            </h3>
            
            <p class="text-sm text-gray-500 line-clamp-2 mb-6 flex-grow">
                {{ $p['descripcion'] }}
            </p>

            <a href="/producto/{{ $p['id_producto'] }}" 
               class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-bold text-white bg-gray-900 rounded-2xl hover:bg-pink-600 focus:ring-4 focus:ring-pink-300 transition-colors duration-300 transform active:scale-95 shadow-lg shadow-gray-200">
                Ver detalle
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>
    </div>

    @endforeach

</div>

@if(count($productos) == 0)
    <div class="text-center py-20 bg-gray-50 rounded-3xl border-2 border-dashed border-gray-200">
        <span class="text-5xl">🧁</span>
        <h3 class="mt-4 text-lg font-medium text-gray-900">No hay productos disponibles</h3>
        <p class="text-gray-500">Vuelve pronto para ver nuestras novedades.</p>
    </div>
@endif

@endsection