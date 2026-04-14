<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PerfilController extends Controller
{

public function index()
{
    if(!session('token')) {
        return redirect('/login');
    }

    $token = session('token');
    $user = session('user');

    $response = Http::withToken($token)
        ->get("http://localhost/awos26a5b/public/api/administradores/".$user['id_empleado']);

    $data = $response->json();

    $usuario = isset($data['data']) ? $data['data'] : $data;

    // 🔥 FORZAR URL CORRECTA DE IMAGEN
    if(isset($usuario['imagen']) && $usuario['imagen'] != null){
        $usuario['imagen'] = str_replace('localhost', '127.0.0.1', $usuario['imagen']);
    } else {
        $usuario['imagen'] = null;
    }

    return view('perfil', compact('usuario'));
}

public function update(Request $request)
{
    $token = session('token');
    $user = session('cliente');

    Http::withToken($token)->put(
        "http://localhost/awos26a5b/public/api/administradores/".$user['id_cliente'],
        [
            'nombre' => $request->nombre,
            'email' => $request->email,
            'puesto' => $request->puesto
        ]
    );

    return redirect('/perfil')->with('success', 'Datos actualizados');
}

public function password(Request $request)
{
    $token = session('token');

    Http::withToken($token)->post(
        'http://localhost/awos26a5b/public/api/change-password',
        [
            'contrasena_actual' => $request->actual,
            'nueva_contrasena' => $request->nueva
        ]
    );

    return redirect('/perfil')->with('success', 'Contraseña actualizada');
}

public function imagen(Request $request)
{
    if(!$request->hasFile('imagen')) {
        return redirect('/perfil')->with('error', 'Selecciona una imagen');
    }

    $token = session('token');
  $user = session('cliente');

    Http::withToken($token)
        ->attach(
            'imagen',
            file_get_contents($request->file('imagen')),
            $request->file('imagen')->getClientOriginalName()
        )
        ->post("http://localhost/awos26a5b/public/api/administradores/".$user['id_empleado']);

    return redirect('/perfil')->with('success', 'Imagen actualizada');
}

}