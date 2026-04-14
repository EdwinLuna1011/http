<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PedidoController extends Controller
{
    public function finalizar(Request $request)
    {
        $carrito = session('carrito', []);
        $cliente = session('cliente');

        if (!$cliente) {
            return redirect('/login')->with('error', 'Debes iniciar sesión');
        }

        if (empty($carrito)) {
            return redirect('/carrito')->with('error', 'Carrito vacío');
        }

       
        $id_pedido = rand(1000, 9999);

        $productos = [];
        $total = 0;

        foreach ($carrito as $id => $item) {
            $productos[] = [
                'id_producto' => $id,
                'cantidad' => $item['cantidad'],
                'precio' => $item['precio']
            ];

            $total += $item['precio'] * $item['cantidad'];
        }

     
        $response = Http::post('http://localhost/awos26a5b/public/api/pedidos', [
            'id_pedido' => $id_pedido,
            'id_cliente' => $cliente['id_cliente'],
            'total' => $total,
            'productos' => $productos
        ]);

        if ($response->failed()) {
            return back()->with('error', 'Error al guardar pedido');
        }

        session()->forget('carrito');

        return redirect('/')->with('success', 'Pedido realizado correctamente');
    }
}