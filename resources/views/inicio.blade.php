@extends('layouts.app')

@section('content')
<div class="relative overflow-hidden bg-white rounded-3xl border border-gray-100 shadow-sm mb-12">
    <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-pink-50 rounded-full blur-3xl opacity-50"></div>
    
    <div class="relative max-w-7xl mx-auto px-8 py-20 lg:py-32 flex flex-col items-center text-center">
        <span class="inline-flex items-center justify-center px-4 py-1.5 mb-6 text-sm font-medium text-pink-700 bg-pink-100 rounded-full">
            ✨ Recién horneado hoy
        </span>

        <h1 class="mb-6 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl">
            Bienvenido a <span class="text-pink-500">nuestra tienda</span>
        </h1>

        <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 italic">
            ¡Gracias por visitarnos! Tradición y sabor en cada bocado.
        </p>
        
        <p class="mb-10 text-md text-gray-400 max-w-2xl">
            Explora nuestro catálogo y encuentra los mejores productos artesanales. 
            Seleccionamos los ingredientes más frescos para que <span class="font-semibold text-gray-600">disfrutes de tu compra</span> al máximo.
        </p>

        <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
            <a href="/catalogo" class="inline-flex justify-center items-center py-4 px-10 text-base font-bold text-center text-white rounded-2xl bg-gray-900 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 transition transform active:scale-95 shadow-xl shadow-gray-200">
                Ver Catálogo
                <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
            <a href="/nosotros" class="inline-flex justify-center items-center py-4 px-10 text-base font-semibold text-center text-gray-900 rounded-2xl border border-gray-200 hover:bg-gray-50 focus:ring-4 focus:ring-gray-100 transition">
                Nuestra Historia
            </a>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 gap-8 text-center md:grid-cols-3">
    <div class="p-6">
        <div class="flex justify-center items-center mb-4 w-12 h-12 rounded-xl bg-pink-50 text-pink-600 mx-auto text-2xl">
            🥐
        </div>
        <h3 class="mb-2 text-xl font-bold text-gray-900">100% Artesanal</h3>
        <p class="text-gray-500 text-sm">Hecho a mano con recetas tradicionales.</p>
    </div>
    <div class="p-6">
        <div class="flex justify-center items-center mb-4 w-12 h-12 rounded-xl bg-pink-50 text-pink-600 mx-auto text-2xl">
            🚚
        </div>
        <h3 class="mb-2 text-xl font-bold text-gray-900">Envío Rápido</h3>
        <p class="text-gray-500 text-sm">Directo de nuestro horno a tu puerta.</p>
    </div>
    <div class="p-6">
        <div class="flex justify-center items-center mb-4 w-12 h-12 rounded-xl bg-pink-50 text-pink-600 mx-auto text-2xl">
            ⭐
        </div>
        <h3 class="mb-2 text-xl font-bold text-gray-900">Calidad Premium</h3>
        <p class="text-gray-500 text-sm">Solo los mejores ingredientes para ti.</p>
    </div>
</div>
@endsection