@extends('layouts.app')

@section('content')
<section class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="gap-16 items-center py-16 px-8 mx-auto max-w-7xl lg:grid lg:grid-cols-2 lg:py-24">
        
        <div class="font-light text-gray-500 sm:text-lg">
            <span class="text-pink-500 font-bold uppercase tracking-widest text-xs mb-4 block">Nuestra Historia</span>
            <h2 class="mb-6 text-4xl tracking-tight font-extrabold text-gray-900">Somos una empresa <br><span class="text-pink-600">apasionada por el sabor.</span></h2>
            
            <p class="mb-6 text-gray-600 leading-relaxed text-lg">
                En nuestra pastelería, no solo vendemos productos; compartimos momentos de felicidad. Cada receta ha sido perfeccionada para ofrecerte una experiencia única que deleite tus sentidos.
            </p>

            <div class="p-6 bg-pink-50 border-l-4 border-pink-500 rounded-r-xl mb-8">
                <h3 class="text-pink-900 font-bold mb-2">Nuestra Misión</h3>
                <p class="text-pink-800 italic">
                    "Ofrecer los mejores productos a nuestros clientes, garantizando frescura, calidad artesanal y un servicio excepcional en cada entrega."
                </p>
            </div>

            <div class="flex items-center gap-4">
                <a href="/catalogo" class="text-white bg-gray-900 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-bold rounded-xl text-sm px-6 py-3.5 transition active:scale-95">
                    Explorar Productos
                </a>
                <a href="/contacto" class="text-gray-600 hover:text-pink-500 font-semibold text-sm transition">
                    Contáctanos →
                </a>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mt-12 lg:mt-0">
            <img class="w-full rounded-2xl shadow-md transform hover:rotate-2 transition duration-300" src="https://images.unsplash.com/photo-1555507036-ab1f4038808a?auto=format&fit=crop&q=80&w=400" alt="Horneando pasteles">
            <img class="mt-8 w-full lg:mt-12 rounded-2xl shadow-md transform hover:-rotate-2 transition duration-300" src="https://images.unsplash.com/photo-1488477181946-6428a0291777?auto=format&fit=crop&q=80&w=400" alt="Postre decorado">
        </div>
    </div>
</section>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12 text-center">
    <div class="p-6 bg-white border border-gray-100 rounded-2xl shadow-sm hover:border-pink-200 transition">
        <div class="text-3xl mb-3">🍯</div>
        <h4 class="font-bold text-gray-900">Ingredientes Naturales</h4>
        <p class="text-sm text-gray-500">Sin conservadores ni colorantes artificiales.</p>
    </div>
    <div class="p-6 bg-white border border-gray-100 rounded-2xl shadow-sm hover:border-pink-200 transition">
        <div class="text-3xl mb-3">❤️</div>
        <h4 class="font-bold text-gray-900">Hecho con Amor</h4>
        <p class="text-sm text-gray-500">Cada pieza es única y cuidada al detalle.</p>
    </div>
    <div class="p-6 bg-white border border-gray-100 rounded-2xl shadow-sm hover:border-pink-200 transition">
        <div class="text-3xl mb-3">✨</div>
        <h4 class="font-bold text-gray-900">Calidad Certificada</h4>
        <p class="text-sm text-gray-500">Los mejores estándares para nuestros clientes.</p>
    </div>
</div>
@endsection