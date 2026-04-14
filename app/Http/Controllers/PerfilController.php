<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PerfilController extends Controller
{

    public function index()
    {
        // 🔥 Validar sesión
        if(!session('token') || !session('cliente')) {
            return redirect('/login');
        }

        $token = session('token');
        $user = session('cliente');

        // 🔥 Petición correcta (CLIENTES, no administradores)
        $response = Http::withToken($token)
            ->get("http://localhost/awos26a5b/public/api/clientes/".$user['id_cliente']);

        if($response->failed()){
            return redirect('/')->with('error', 'Error al obtener datos del perfil');
        }

        $data = $response->json();

        $usuario = isset($data['data']) ? $data['data'] : $data;

        // 🔥 Corregir imagen
        if(isset($usuario['imagen']) && $usuario['imagen'] != null){
            $usuario['imagen'] = str_replace('localhost', '127.0.0.1', $usuario['imagen']);
        } else {
            $usuario['imagen'] = null;
        }

        return view('perfil', compact('usuario'));
    }

    public function update(Request $request)
    {
        if(!session('token') || !session('cliente')) {
            return redirect('/login');
        }

        $token = session('token');
        $user = session('cliente');

        Http::withToken($token)->put(
            "http://localhost/awos26a5b/public/api/clientes/".$user['id_cliente'],
            [
                'nombre' => $request->nombre,
                'email' => $request->email
            ]
        );

        return redirect('/perfil')->with('success', 'Datos actualizados');
    }

    public function password(Request $request)
    {
        if(!session('token')) {
            return redirect('/login');
        }

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
        if(!session('token') || !session('cliente')) {
            return redirect('/login');
        }

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
            ->post("http://localhost/awos26a5b/public/api/clientes/".$user['id_cliente']);

        return redirect('/perfil')->with('success', 'Imagen actualizada');
    }

}