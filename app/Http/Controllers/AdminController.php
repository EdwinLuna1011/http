<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{

public function index()
{
$response = Http::get('http://localhost/awos26a5b/public/api/administradores');

$administradores = $response->json();

return view('administradores.index', compact('administradores'));
}

public function store(Request $request)
{

$response = Http::attach(
'imagen',
file_get_contents($request->imagen),
$request->imagen->getClientOriginalName()
)->post('http://localhost/awos26a5b/public/api/administradores', [

'nombre' => $request->nombre,
'apellido' => $request->apellido,
'email' => $request->email,
'puesto' => $request->puesto,
'usuario' => $request->usuario,
'contrasena' => $request->contrasena,
'salario' => $request->salario

]);

return redirect('/administradores');
}

public function update(Request $request, $id)
{

$http = Http::attach(
'imagen',
$request->imagen ? file_get_contents($request->imagen) : '',
$request->imagen ? $request->imagen->getClientOriginalName() : ''
);

$http->put("http://localhost/awos26a5b/public/api/administradores/$id", [

'nombre' => $request->nombre,
'apellido' => $request->apellido,
'email' => $request->email,
'puesto' => $request->puesto,
'usuario' => $request->usuario,
'salario' => $request->salario

]);

return redirect('/administradores');
}

public function destroy($id)
{

Http::delete("http://localhost/awos26a5b/public/api/administradores/$id");

return redirect('/administradores');

}

}