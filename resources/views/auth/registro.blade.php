@extends('layouts.app')

@section('content')

<h2>Registro</h2>

<form method="POST" action="/registro">
@csrf

<input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" required>
<input type="text" name="apellido" placeholder="Apellido" class="form-control mb-2" required>
<input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
<input type="text" name="usuario" placeholder="Usuario" class="form-control mb-2" required>
<input type="password" name="contrasena" placeholder="Contraseña" class="form-control mb-2" required>

<button class="btn btn-success">Registrarse</button>

</form>

@endsection