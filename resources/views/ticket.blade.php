@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto my-10">
    <div class="bg-white p-8 shadow-2xl rounded-sm border-t-8 border-pink-500 relative overflow-hidden">
        
        <div class="absolute top-0 left-0 w-full h-1 bg-[radial-gradient(circle,_#f3f4f6_5px,_transparent_5px)] bg-[length:15px_15px]"></div>

        <div class="text-center mb-8">
            <h2 class="text-2xl font-black tracking-tighter text-gray-900 uppercase">Pastelería Premium</h2>
            <p class="text-xs text-gray-500 uppercase tracking-widest mt-1">Ticket de Venta #{{ rand(1000, 9999) }}</p>
            <p class="text-xs text-gray-400 italic mt-1">{{ date('d/m/Y H:i') }}</p>
        </div>

        <div class="border-b border-dashed border-gray-200 mb-6"></div>

        <div class="flow-root mb-8">
            <ul role="list" class="divide-y divide-gray-100">
                @php $total = 0; @endphp
                @foreach($carrito as $id => $item)
                    @php 
                        $subtotal = $item['precio'] * $item['cantidad'];
                        $total += $subtotal;
                    @endphp
                    <li class="py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-bold text-gray-900 truncate">
                                    {{ $item['nombre'] }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    {{ $item['cantidad'] }} x $ {{ number_format($item['precio'], 2) }}
                                </p>
                            </div>
                            <div class="inline-flex items-center text-sm font-black text-gray-900">
                                $ {{ number_format($subtotal, 2) }}
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="space-y-2 border-t border-dashed border-gray-200 pt-6">
            <div class="flex justify-between text-sm text-gray-600">
                <span>Subtotal:</span>
                <span>$ {{ number_format($total / 1.16, 2) }}</span>
            </div>
            <div class="flex justify-between text-sm text-gray-600">
                <span>IVA (16%):</span>
                <span>$ {{ number_format($total - ($total / 1.16), 2) }}</span>
            </div>
            <div class="flex justify-between text-xl font-black text-gray-900 pt-2">
                <span>TOTAL:</span>
                <span class="text-pink-600">$ {{ number_format($total, 2) }}</span>
            </div>
        </div>

        <div class="mt-10 text-center">
            <p class="text-sm font-bold text-gray-900 uppercase tracking-tighter">¡Gracias por tu dulzura!</p>
            <p class="text-[10px] text-gray-400 mt-2 italic leading-tight">
                Conserva este ticket para cualquier cambio. <br>
                Visítanos en www.pasteleria.com
            </p>
            
            <div class="mt-6 flex justify-center opacity-30">
                <div class="h-10 w-48 bg-[repeating-linear-gradient(90deg,_#000_0px,_#000_2px,_transparent_2px,_transparent_4px)]"></div>
            </div>
        </div>
    </div>

    <div class="mt-8 flex gap-4 no-print">
        <button onclick="window.print()" class="flex-1 px-6 py-3 bg-gray-900 text-white font-bold rounded-2xl hover:bg-gray-800 transition shadow-lg active:scale-95">
            🖨️ Imprimir Ticket
        </button>
        <a href="/" class="flex-1 px-6 py-3 bg-white border border-gray-200 text-gray-600 font-bold rounded-2xl hover:bg-gray-50 transition text-center shadow-sm">
            Volver al Inicio
        </a>
    </div>
</div>

<style>
    /* Estilo para que solo se imprima el ticket y no la navegación ni el footer */
    @media print {
        nav, footer, .no-print {
            display: none !important;
        }
        body {
            background-color: white !important;
        }
        .max-w-md {
            margin: 0 auto !important;
            box-shadow: none !important;
        }
    }
</style>
@endsection