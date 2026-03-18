@extends('layouts.app')

@section('content')

<h1 class="mb-4">Catálogo de Productos</h1>

<div class="row">

@foreach($productos as $p)

<div class="col-md-4 mb-4">
<div class="card h-100 shadow-sm">

<img src="{{ $p['imagen1'] }}" class="card-img-top img-producto">

<div class="card-body text-center">
<h5>{{ $p['nombre'] }}</h5>
<p>{{ $p['descripcion'] }}</p>
<p><strong>$ {{ $p['precio'] }}</strong></p>

<a href="/producto/{{ $p['id_producto'] }}" class="btn btn-primary">
Ver detalle
</a>

</div>

</div>
</div>

@endforeach

</div>

@endsection