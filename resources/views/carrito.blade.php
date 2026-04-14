@extends('layouts.app')

@section('content')

    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-end mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Tu Carrito</h1>
                <p class="text-gray-500 text-sm italic">Revisa tus antojos antes de finalizar.</p>
            </div>
            @if (session('carrito'))
                <a href="/carrito/vaciar"
                    class="text-sm font-semibold text-red-500 hover:text-red-700 transition flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Vaciar carrito
                </a>
            @endif
        </div>

        @if (session('carrito'))
            <div class="relative overflow-x-auto shadow-sm border border-gray-100 rounded-3xl bg-white mb-8">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-400 uppercase bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4 font-bold">Producto</th>
                            <th class="px-6 py-4 font-bold text-center">Precio</th>
                            <th class="px-6 py-4 font-bold text-center">Cantidad</th>
                            <th class="px-6 py-4 font-bold text-center">Subtotal</th>
                            <th class="px-6 py-4 font-bold text-right text-pink-500">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @php $total = 0; @endphp
                        @foreach ($carrito as $id => $item)
                            @php
                                $subtotal = $item['precio'] * $item['cantidad'];
                                $total += $subtotal;
                            @endphp
                            <tr class="hover:bg-pink-50/30 transition-colors">
                                <td class="px-6 py-4 font-medium text-gray-900">
                                    <div class="flex items-center gap-4">
                                        <img src="{{ $item['imagen'] }}"
                                            class="w-16 h-16 object-cover rounded-xl border shadow-sm">
                                        <span class="font-bold text-base">{{ $item['nombre'] }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">$ {{ number_format($item['precio'], 2) }}</td>
                                <td class="px-6 py-4 text-center">
                                    <form action="/carrito/actualizar/{{ $id }}" method="POST"
                                        class="flex justify-center gap-2">
                                        @csrf
                                        <input type="number" name="cantidad" value="{{ $item['cantidad'] }}" min="1"
                                            class="w-16 p-2 text-center border rounded-lg">
                                        <button class="p-2 text-white bg-gray-900 rounded-lg hover:bg-pink-500">
                                            ✔
                                        </button>
                                    </form>
                                </td>
                                <td class="px-6 py-4 text-center font-bold">$ {{ number_format($subtotal, 2) }}</td>
                                <td class="px-6 py-4 text-right">
                                    <a href="/carrito/eliminar/{{ $id }}"
                                        class="p-2 text-red-500 hover:bg-red-500 hover:text-white rounded-lg">
                                        ✖
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-center bg-white p-8 rounded-3xl border shadow-sm gap-6">
                <div>
                    <span class="text-gray-400 text-sm uppercase">Total a pagar</span>
                    <h3 class="text-5xl font-black">$ {{ number_format($total, 2) }}</h3>
                </div>

                <div class="flex gap-4">

                    <a href="/catalogo"
                        class="px-8 py-4 text-sm font-bold text-gray-500 bg-gray-100 rounded-2xl">
                        Seguir Comprando
                    </a>

                    {{-- 🔥 FORM OCULTO --}}
                    @if(session('cliente'))
                    <form action="/pedido/finalizar" method="POST">
                        @csrf

                        <input type="hidden" name="id_cliente" value="{{ session('cliente')['id_cliente'] }}">
                        <input type="hidden" name="total" value="{{ $total }}">

                        @foreach ($carrito as $id => $item)
                            <input type="hidden" name="productos[{{ $loop->index }}][id_producto]" value="{{ $id }}">
                            <input type="hidden" name="productos[{{ $loop->index }}][cantidad]" value="{{ $item['cantidad'] }}">
                            <input type="hidden" name="productos[{{ $loop->index }}][precio]" value="{{ $item['precio'] }}">
                        @endforeach

                        <button type="submit"
                            class="px-12 py-4 text-sm font-bold text-white bg-pink-500 rounded-2xl hover:bg-pink-600 shadow-xl">
                            Finalizar Pedido
                        </button>
                    </form>
                    @else
                        <a href="/login"
                            class="px-12 py-4 text-sm font-bold text-white bg-gray-400 rounded-2xl">
                            Inicia sesión
                        </a>
                    @endif

                </div>
            </div>
        @else
            <div class="text-center py-24 bg-white border rounded-3xl shadow-sm">
                <h2 class="text-2xl font-bold">Tu carrito está vacío</h2>
                <a href="/catalogo"
                    class="px-8 py-4 text-sm font-bold text-white bg-gray-900 rounded-2xl">
                    Ir al Catálogo
                </a>
            </div>
        @endif
    </div>

@endsection