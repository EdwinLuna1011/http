<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PerfilController;

// ------------------ PÁGINAS ------------------

Route::get('/', function () {
    return view('inicio');
});

Route::get('/nosotros', function () {
    return view('nosotros');
});

Route::get('/contacto', function () {
    return view('contacto');
});

// ------------------ PRODUCTOS ------------------

Route::get('/catalogo', [ProductoController::class, 'index']);
Route::get('/producto/{id}', [ProductoController::class, 'show']);

// ------------------ CARRITO ------------------

Route::get('/carrito', [CarritoController::class, 'index']);
Route::post('/carrito/agregar', [CarritoController::class, 'agregar']);
Route::post('/carrito/actualizar/{id}', [CarritoController::class, 'actualizar']);
Route::get('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar']);
Route::get('/carrito/vaciar', [CarritoController::class, 'vaciar']);

Route::get('/carrito/ticket', function () {
    $carrito = session('carrito', []);
    
    if (empty($carrito)) {
        return redirect('/carrito')->with('error', 'El carrito está vacío');
    }

    return view('ticket', compact('carrito'));
});

// ------------------ AUTENTICACIÓN ------------------

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/registro', function () {
    return view('auth.registro');
});
Route::post('/registro', [AuthController::class, 'registro']);

// ------------------ PERFIL (PROTEGIDO) ------------------

Route::get('/perfil', [PerfilController::class, 'index']);
Route::post('/perfil/actualizar', [PerfilController::class, 'update']);
Route::post('/perfil/password', [PerfilController::class, 'password']);
Route::post('/perfil/imagen', [PerfilController::class, 'imagen']);


use App\Http\Controllers\PedidoController;

Route::post('/pedido/finalizar', [PedidoController::class, 'finalizar']);

