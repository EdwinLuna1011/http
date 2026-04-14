@extends('layouts.app')

@section('content')

<h2>Login</h2>

<form method="POST" action="/login">
@csrf

<input type="text" name="usuario" placeholder="Usuario" required class="form-control mb-2">
<input type="password" name="contrasena" placeholder="Contraseña" required class="form-control mb-2">

<button class="btn btn-primary">Iniciar sesión</button>

</form>

@endsection