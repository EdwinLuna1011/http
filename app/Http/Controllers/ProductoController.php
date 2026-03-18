<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ProductoController extends Controller
{

public function index()
{
$response = Http::get('http://localhost/awos26a5b/public/api/productos');

$data = $response->json();

// 🔥 AQUÍ ESTÁ LA CLAVE
$productos = $data['data'];

return view('catalogo', compact('productos'));
}

public function show($id)
{
$response = Http::get("http://localhost/awos26a5b/public/api/productos/$id");

$data = $response->json();

// 🔥 POR SI TAMBIÉN VIENE IGUAL
$producto = isset($data['data']) ? $data['data'] : $data;

return view('detalle', compact('producto'));
}

}