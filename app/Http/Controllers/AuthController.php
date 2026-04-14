<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $response = Http::post('http://localhost/awos26a5b/public/api/login', [
            'usuario' => $request->usuario,
            'contrasena' => $request->contrasena
        ]);

        if ($response->failed()) {
            return back()->with('error', 'Login incorrecto');
        }

        $data = $response->json();

      
        session([
            'cliente' => $data['user'],
            'token' => $data['access_token']
        ]);

        return redirect('/catalogo');
    }

    public function logout()
    {
        
        session()->flush();

        return redirect('/');
    }

    public function registro(Request $request)
    {
        Http::post('http://localhost/awos26a5b/public/api/clientes', [
            'nombre' => $request->nombre,
            'apellidos' => $request->apellido,
            'telefono' => '0000000000',
            'email' => $request->email,
            'usuario' => $request->usuario,
            'contrasena' => $request->contrasena,
            'estado' => 1
        ]);

        return redirect('/login');
    }

}