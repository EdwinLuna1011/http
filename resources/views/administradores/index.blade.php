<!DOCTYPE html>
<html>
<head>
    <title>Administradores</title>
</head>
<body>

<h1>Lista de Administradores</h1>

<h2>Agregar Administrador</h2>

<form method="POST" action="/administradores" enctype="multipart/form-data">
@csrf

<input type="text" name="nombre" placeholder="Nombre" required>
<input type="text" name="apellido" placeholder="Apellido" required>
<input type="email" name="email" placeholder="Email" required>
<input type="text" name="puesto" placeholder="Puesto" required>
<input type="text" name="usuario" placeholder="Usuario" required>
<input type="text" name="contrasena" placeholder="Contraseña" required>
<input type="number" name="salario" placeholder="Salario" required>

<input type="file" name="imagen" required>

<button type="submit">Crear</button>

</form>

<br><br>

<table border="1">

<tr>
<th>ID</th>
<th>Nombre</th>
<th>Apellido</th>
<th>Email</th>
<th>Puesto</th>
<th>Imagen</th>
<th>Actualizar</th>
<th>Eliminar</th>
</tr>

@foreach($administradores as $admin)

<tr>

<td>{{ $admin['id_empleado'] }}</td>
<td>{{ $admin['nombre'] }}</td>
<td>{{ $admin['apellido'] }}</td>
<td>{{ $admin['email'] }}</td>
<td>{{ $admin['puesto'] }}</td>

<td>
@if(isset($admin['imagen']))
<img src="{{ $admin['imagen'] }}" width="80">
@endif
</td>

<td>

<form method="POST" action="/administradores/{{ $admin['id_empleado'] }}" enctype="multipart/form-data">

@csrf
@method('PUT')

<input type="text" name="nombre" value="{{ $admin['nombre'] }}">
<input type="text" name="apellido" value="{{ $admin['apellido'] }}">
<input type="text" name="email" value="{{ $admin['email'] }}">
<input type="text" name="puesto" value="{{ $admin['puesto'] }}">
<input type="text" name="usuario" value="{{ $admin['usuario'] ?? '' }}">
<input type="number" name="salario" value="{{ $admin['salario'] ?? '' }}">

<input type="file" name="imagen">

<button type="submit">Actualizar</button>

</form>

</td>

<td>

<form method="POST" action="/administradores/{{ $admin['id_empleado'] }}">
@csrf
@method('DELETE')

<button type="submit">Eliminar</button>

</form>

</td>

</tr>

@endforeach

</table>

</body>
</html>