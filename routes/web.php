<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/administradores', [AdminController::class, 'index']);
Route::post('/administradores', [AdminController::class, 'store']);
Route::put('/administradores/{id}', [AdminController::class, 'update']);
Route::delete('/administradores/{id}', [AdminController::class, 'destroy']);

Route::get('/', function () {
    return redirect('/administradores');
});