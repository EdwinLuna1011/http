<!DOCTYPE html>
<html>
<head>
    <title>Clientes</title>
</head>
<body>

<h1>Lista de Clientes</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Telefono</th>
        <th>Email</th>
    </tr>

    @foreach($clientes as $cliente)
    <tr>
        <td>{{ $cliente['id_cliente'] }}</td>
        <td>{{ $cliente['nombre'] }}</td>
        <td>{{ $cliente['apellidos'] }}</td>
        <td>{{ $cliente['telefono'] }}</td>
        <td>{{ $cliente['email'] }}</td>
    </tr>
    @endforeach

</table>

</body>
</html>